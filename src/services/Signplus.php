<?php

namespace Signplus\Services;

use Signplus\Utils\Serializer;
use Signplus\Models\AddAnnotationRequest;
use Signplus\Models\AddEnvelopeDocumentRequest;
use Signplus\Models\AddEnvelopeSigningStepsRequest;
use Signplus\Models\AddTemplateDocumentRequest;
use Signplus\Models\AddTemplateSigningStepsRequest;
use Signplus\Models\Annotation;
use Signplus\Models\CreateEnvelopeFromTemplateRequest;
use Signplus\Models\CreateEnvelopeRequest;
use Signplus\Models\CreateTemplateRequest;
use Signplus\Models\CreateWebhookRequest;
use Signplus\Models\Document;
use Signplus\Models\Envelope;
use Signplus\Models\EnvelopeNotification;
use Signplus\Models\ListEnvelopeDocumentAnnotationsResponse;
use Signplus\Models\ListEnvelopeDocumentsResponse;
use Signplus\Models\ListEnvelopesRequest;
use Signplus\Models\ListEnvelopesResponse;
use Signplus\Models\ListTemplateAnnotationsResponse;
use Signplus\Models\ListTemplateDocumentAnnotationsResponse;
use Signplus\Models\ListTemplateDocumentsResponse;
use Signplus\Models\ListTemplatesRequest;
use Signplus\Models\ListTemplatesResponse;
use Signplus\Models\ListWebhooksRequest;
use Signplus\Models\ListWebhooksResponse;
use Signplus\Models\RenameEnvelopeRequest;
use Signplus\Models\RenameTemplateRequest;
use Signplus\Models\SetEnvelopeCommentRequest;
use Signplus\Models\SetEnvelopeDynamicFieldsRequest;
use Signplus\Models\SetEnvelopeExpirationRequest;
use Signplus\Models\SetEnvelopeLegalityLevelRequest;
use Signplus\Models\SetTemplateCommentRequest;
use Signplus\Models\Template;
use Signplus\Models\Webhook;

class Signplus extends BaseService
{
    /**
     * Create new envelope
     */
    public function createEnvelope(CreateEnvelopeRequest $input): Envelope
    {
        $data = $this->sendRequest('post', '/envelope', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Create new envelope from template
     */
    public function createEnvelopeFromTemplate(CreateEnvelopeFromTemplateRequest $input, string $templateId): Envelope
    {
        $data = $this->sendRequest('post', "/envelope/from_template/{$templateId}", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * List envelopes
     */
    public function listEnvelopes(?ListEnvelopesRequest $input = null): ListEnvelopesResponse
    {
        $data = $this->sendRequest('post', '/envelopes', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, ListEnvelopesResponse::class);
    }

    /**
     * Get envelope
     */
    public function getEnvelope(string $envelopeId): Envelope
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}", []);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Delete envelope
     */
    public function deleteEnvelope(string $envelopeId): mixed
    {
        $data = $this->sendRequest('delete', "/envelope/{$envelopeId}", []);

        return json_decode($data, true);
    }

    /**
     * Get envelope document
     */
    public function getEnvelopeDocument(string $envelopeId, string $documentId): Document
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/document/{$documentId}", []);

        return Serializer::deserialize($data, Document::class);
    }

    /**
     * Get envelope documents
     */
    public function getEnvelopeDocuments(string $envelopeId): ListEnvelopeDocumentsResponse
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/documents", []);

        return Serializer::deserialize($data, ListEnvelopeDocumentsResponse::class);
    }

    /**
     * Add envelope document
     */
    public function addEnvelopeDocument(AddEnvelopeDocumentRequest $input, string $envelopeId): Document
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/document", ['multipart' => $input->toMultipart()]);

        return Serializer::deserialize($data, Document::class);
    }

    /**
     * Set envelope dynamic fields
     */
    public function setEnvelopeDynamicFields(SetEnvelopeDynamicFieldsRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/dynamic_fields", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Add envelope signing steps
     */
    public function addEnvelopeSigningSteps(AddEnvelopeSigningStepsRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/signing_steps", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Send envelope for signature
     */
    public function sendEnvelope(string $envelopeId): Envelope
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/send", []);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Duplicate envelope
     */
    public function duplicateEnvelope(string $envelopeId): Envelope
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/duplicate", []);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Void envelope
     */
    public function voidEnvelope(string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/void", []);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Rename envelope
     */
    public function renameEnvelope(RenameEnvelopeRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/rename", ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Set envelope comment
     */
    public function setEnvelopeComment(SetEnvelopeCommentRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_comment", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Set envelope notification
     */
    public function setEnvelopeNotification(EnvelopeNotification $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_notification", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Set envelope expiration date
     */
    public function setEnvelopeExpirationDate(SetEnvelopeExpirationRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_expiration_date", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Set envelope legality level
     */
    public function setEnvelopeLegalityLevel(SetEnvelopeLegalityLevelRequest $input, string $envelopeId): Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_legality_level", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Envelope::class);
    }

    /**
     * Get envelope annotations
     */
    public function getEnvelopeAnnotations(string $envelopeId): array
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/annotations", []);

        return json_decode($data, true);
    }

    /**
     * Get envelope document annotations
     */
    public function getEnvelopeDocumentAnnotations(
        string $envelopeId,
        string $documentId
    ): ListEnvelopeDocumentAnnotationsResponse {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/annotations/{$documentId}", []);

        return Serializer::deserialize($data, ListEnvelopeDocumentAnnotationsResponse::class);
    }

    /**
     * Add envelope annotation
     */
    public function addEnvelopeAnnotation(AddAnnotationRequest $input, string $envelopeId): Annotation
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/annotation", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Annotation::class);
    }

    /**
     * Delete envelope annotation
     */
    public function deleteEnvelopeAnnotation(string $envelopeId, string $annotationId): mixed
    {
        $data = $this->sendRequest('delete', "/envelope/{$envelopeId}/annotation/{$annotationId}", []);

        return json_decode($data, true);
    }

    /**
     * Create new template
     */
    public function createTemplate(CreateTemplateRequest $input): Template
    {
        $data = $this->sendRequest('post', '/template', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * List templates
     */
    public function listTemplates(?ListTemplatesRequest $input = null): ListTemplatesResponse
    {
        $data = $this->sendRequest('post', '/templates', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, ListTemplatesResponse::class);
    }

    /**
     * Get template
     */
    public function getTemplate(string $templateId): Template
    {
        $data = $this->sendRequest('get', "/template/{$templateId}", []);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Delete template
     */
    public function deleteTemplate(string $templateId): mixed
    {
        $data = $this->sendRequest('delete', "/template/{$templateId}", []);

        return json_decode($data, true);
    }

    /**
     * Duplicate template
     */
    public function duplicateTemplate(string $templateId): Template
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/duplicate", []);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Add template document
     */
    public function addTemplateDocument(AddTemplateDocumentRequest $input, string $templateId): Document
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/document", ['multipart' => $input->toMultipart()]);

        return Serializer::deserialize($data, Document::class);
    }

    /**
     * Get template document
     */
    public function getTemplateDocument(string $templateId, string $documentId): Document
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/document/{$documentId}", []);

        return Serializer::deserialize($data, Document::class);
    }

    /**
     * Get template documents
     */
    public function getTemplateDocuments(string $templateId): ListTemplateDocumentsResponse
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/documents", []);

        return Serializer::deserialize($data, ListTemplateDocumentsResponse::class);
    }

    /**
     * Add template signing steps
     */
    public function addTemplateSigningSteps(AddTemplateSigningStepsRequest $input, string $templateId): Template
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/signing_steps", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Rename template
     */
    public function renameTemplate(RenameTemplateRequest $input, string $templateId): Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/rename", ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Set template comment
     */
    public function setTemplateComment(SetTemplateCommentRequest $input, string $templateId): Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/set_comment", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Set template notification
     */
    public function setTemplateNotification(EnvelopeNotification $input, string $templateId): Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/set_notification", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Template::class);
    }

    /**
     * Get template annotations
     */
    public function getTemplateAnnotations(string $templateId): ListTemplateAnnotationsResponse
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/annotations", []);

        return Serializer::deserialize($data, ListTemplateAnnotationsResponse::class);
    }

    /**
     * Get document template annotations
     */
    public function getDocumentTemplateAnnotations(
        string $templateId,
        string $documentId
    ): ListTemplateDocumentAnnotationsResponse {
        $data = $this->sendRequest('get', "/template/{$templateId}/annotations/{$documentId}", []);

        return Serializer::deserialize($data, ListTemplateDocumentAnnotationsResponse::class);
    }

    /**
     * Add template annotation
     */
    public function addTemplateAnnotation(AddAnnotationRequest $input, string $templateId): Annotation
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/annotation", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Annotation::class);
    }

    /**
     * Delete template annotation
     */
    public function deleteTemplateAnnotation(string $templateId, string $annotationId): mixed
    {
        $data = $this->sendRequest('delete', "/template/{$templateId}/annotation/{$annotationId}", []);

        return json_decode($data, true);
    }

    /**
     * Create webhook
     */
    public function createWebhook(CreateWebhookRequest $input): Webhook
    {
        $data = $this->sendRequest('post', '/webhook', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Webhook::class);
    }

    /**
     * List webhooks
     */
    public function listWebhooks(?ListWebhooksRequest $input = null): ListWebhooksResponse
    {
        $data = $this->sendRequest('post', '/webhooks', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, ListWebhooksResponse::class);
    }

    /**
     * Delete webhook
     */
    public function deleteWebhook(string $webhookId): mixed
    {
        $data = $this->sendRequest('delete', "/webhook/{$webhookId}", []);

        return json_decode($data, true);
    }
}
