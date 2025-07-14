<?php

namespace Signplus\Services;

use Signplus\Utils\Serializer;
use Signplus\Models;

class Signplus extends BaseService
{
    /**
     * Create new envelope
     */
    public function createEnvelope(Models\CreateEnvelopeRequest $input): Models\Envelope
    {
        $data = $this->sendRequest('post', '/envelope', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Create new envelope from template
     */
    public function createEnvelopeFromTemplate(
        Models\CreateEnvelopeFromTemplateRequest $input,
        string $templateId
    ): Models\Envelope {
        $data = $this->sendRequest('post', "/envelope/from_template/{$templateId}", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * List envelopes
     */
    public function listEnvelopes(?Models\ListEnvelopesRequest $input = null): Models\ListEnvelopesResponse
    {
        $data = $this->sendRequest('post', '/envelopes', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\ListEnvelopesResponse::class);
    }

    /**
     * Get envelope
     */
    public function getEnvelope(string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}", []);

        return Serializer::deserialize($data, Models\Envelope::class);
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
     * Download signed documents for an envelope
     */
    public function downloadEnvelopeSignedDocuments(string $envelopeId, bool $certificateOfCompletion = null): mixed
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/signed_documents", [
            'query' => [
                'certificate_of_completion' => $certificateOfCompletion,
            ],
        ]);

        return json_decode($data, true);
    }

    /**
     * Download certificate of completion for an envelope
     */
    public function downloadEnvelopeCertificate(string $envelopeId): mixed
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/certificate", []);

        return json_decode($data, true);
    }

    /**
     * Get envelope document
     */
    public function getEnvelopeDocument(string $envelopeId, string $documentId): Models\Document
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/document/{$documentId}", []);

        return Serializer::deserialize($data, Models\Document::class);
    }

    /**
     * Get envelope documents
     */
    public function getEnvelopeDocuments(string $envelopeId): Models\ListEnvelopeDocumentsResponse
    {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/documents", []);

        return Serializer::deserialize($data, Models\ListEnvelopeDocumentsResponse::class);
    }

    /**
     * Add envelope document
     */
    public function addEnvelopeDocument(Models\AddEnvelopeDocumentRequest $input, string $envelopeId): Models\Document
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/document", ['multipart' => $input->toMultipart()]);

        return Serializer::deserialize($data, Models\Document::class);
    }

    /**
     * Set envelope dynamic fields
     */
    public function setEnvelopeDynamicFields(
        Models\SetEnvelopeDynamicFieldsRequest $input,
        string $envelopeId
    ): Models\Envelope {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/dynamic_fields", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Add envelope signing steps
     */
    public function addEnvelopeSigningSteps(
        Models\AddEnvelopeSigningStepsRequest $input,
        string $envelopeId
    ): Models\Envelope {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/signing_steps", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Send envelope for signature
     */
    public function sendEnvelope(string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/send", []);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Duplicate envelope
     */
    public function duplicateEnvelope(string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/duplicate", []);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Void envelope
     */
    public function voidEnvelope(string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/void", []);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Rename envelope
     */
    public function renameEnvelope(Models\RenameEnvelopeRequest $input, string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/rename", ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Set envelope comment
     */
    public function setEnvelopeComment(Models\SetEnvelopeCommentRequest $input, string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_comment", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Set envelope notification
     */
    public function setEnvelopeNotification(Models\EnvelopeNotification $input, string $envelopeId): Models\Envelope
    {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_notification", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Set envelope expiration date
     */
    public function setEnvelopeExpirationDate(
        Models\SetEnvelopeExpirationRequest $input,
        string $envelopeId
    ): Models\Envelope {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_expiration_date", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
    }

    /**
     * Set envelope legality level
     */
    public function setEnvelopeLegalityLevel(
        Models\SetEnvelopeLegalityLevelRequest $input,
        string $envelopeId
    ): Models\Envelope {
        $data = $this->sendRequest('put', "/envelope/{$envelopeId}/set_legality_level", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Envelope::class);
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
    ): Models\ListEnvelopeDocumentAnnotationsResponse {
        $data = $this->sendRequest('get', "/envelope/{$envelopeId}/annotations/{$documentId}", []);

        return Serializer::deserialize($data, Models\ListEnvelopeDocumentAnnotationsResponse::class);
    }

    /**
     * Add envelope annotation
     */
    public function addEnvelopeAnnotation(Models\AddAnnotationRequest $input, string $envelopeId): Models\Annotation
    {
        $data = $this->sendRequest('post', "/envelope/{$envelopeId}/annotation", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Annotation::class);
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
    public function createTemplate(Models\CreateTemplateRequest $input): Models\Template
    {
        $data = $this->sendRequest('post', '/template', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * List templates
     */
    public function listTemplates(?Models\ListTemplatesRequest $input = null): Models\ListTemplatesResponse
    {
        $data = $this->sendRequest('post', '/templates', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\ListTemplatesResponse::class);
    }

    /**
     * Get template
     */
    public function getTemplate(string $templateId): Models\Template
    {
        $data = $this->sendRequest('get', "/template/{$templateId}", []);

        return Serializer::deserialize($data, Models\Template::class);
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
    public function duplicateTemplate(string $templateId): Models\Template
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/duplicate", []);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * Add template document
     */
    public function addTemplateDocument(Models\AddTemplateDocumentRequest $input, string $templateId): Models\Document
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/document", ['multipart' => $input->toMultipart()]);

        return Serializer::deserialize($data, Models\Document::class);
    }

    /**
     * Get template document
     */
    public function getTemplateDocument(string $templateId, string $documentId): Models\Document
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/document/{$documentId}", []);

        return Serializer::deserialize($data, Models\Document::class);
    }

    /**
     * Get template documents
     */
    public function getTemplateDocuments(string $templateId): Models\ListTemplateDocumentsResponse
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/documents", []);

        return Serializer::deserialize($data, Models\ListTemplateDocumentsResponse::class);
    }

    /**
     * Add template signing steps
     */
    public function addTemplateSigningSteps(
        Models\AddTemplateSigningStepsRequest $input,
        string $templateId
    ): Models\Template {
        $data = $this->sendRequest('post', "/template/{$templateId}/signing_steps", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * Rename template
     */
    public function renameTemplate(Models\RenameTemplateRequest $input, string $templateId): Models\Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/rename", ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * Set template comment
     */
    public function setTemplateComment(Models\SetTemplateCommentRequest $input, string $templateId): Models\Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/set_comment", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * Set template notification
     */
    public function setTemplateNotification(Models\EnvelopeNotification $input, string $templateId): Models\Template
    {
        $data = $this->sendRequest('put', "/template/{$templateId}/set_notification", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Template::class);
    }

    /**
     * Get template annotations
     */
    public function getTemplateAnnotations(string $templateId): Models\ListTemplateAnnotationsResponse
    {
        $data = $this->sendRequest('get', "/template/{$templateId}/annotations", []);

        return Serializer::deserialize($data, Models\ListTemplateAnnotationsResponse::class);
    }

    /**
     * Get document template annotations
     */
    public function getDocumentTemplateAnnotations(
        string $templateId,
        string $documentId
    ): Models\ListTemplateDocumentAnnotationsResponse {
        $data = $this->sendRequest('get', "/template/{$templateId}/annotations/{$documentId}", []);

        return Serializer::deserialize($data, Models\ListTemplateDocumentAnnotationsResponse::class);
    }

    /**
     * Add template annotation
     */
    public function addTemplateAnnotation(Models\AddAnnotationRequest $input, string $templateId): Models\Annotation
    {
        $data = $this->sendRequest('post', "/template/{$templateId}/annotation", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\Annotation::class);
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
    public function createWebhook(Models\CreateWebhookRequest $input): Models\Webhook
    {
        $data = $this->sendRequest('post', '/webhook', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\Webhook::class);
    }

    /**
     * List webhooks
     */
    public function listWebhooks(?Models\ListWebhooksRequest $input = null): Models\ListWebhooksResponse
    {
        $data = $this->sendRequest('post', '/webhooks', ['json' => Serializer::serialize($input)]);

        return Serializer::deserialize($data, Models\ListWebhooksResponse::class);
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
