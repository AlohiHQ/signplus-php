<?php

declare(strict_types=1);

namespace Signplus;

use Signplus\Services;

/**
 * Main SDK client providing access to all API service endpoints.
 *
 * This client acts as the central entry point for interacting with the API,
 * managing service instances, authentication, and base URL configuration.
 * Each service property provides access to a specific group of API endpoints.
 */
class Client
{
  public Services\TemplateId $templateId;
  public Services\SignedDocuments $signedDocuments;
  public Services\Certificate $certificate;
  public Services\DocumentId $documentId;
  public Services\Document $document;
  public Services\Documents $documents;
  public Services\DynamicFields $dynamicFields;
  public Services\SigningSteps $signingSteps;
  public Services\Settings $settings;
  public Services\Placeholders $placeholders;
  public Services\FileId $fileId;
  public Services\Send $send;
  public Services\Duplicate $duplicate;
  public Services\Void_ $void_;
  public Services\Rename $rename;
  public Services\SetComment $setComment;
  public Services\SetNotification $setNotification;
  public Services\SetExpirationDate $setExpirationDate;
  public Services\SetLegalityLevel $setLegalityLevel;
  public Services\EnvelopeEnvelopeIdAnnotationsDocumentId $envelopeEnvelopeIdAnnotationsDocumentId;
  public Services\Annotations $annotations;
  public Services\AnnotationId $annotationId;
  public Services\Annotation $annotation;
  public Services\EnvelopeId $envelopeId;
  public Services\Envelope $envelope;
  public Services\Envelopes $envelopes;
  public Services\TemplateTemplateIdDuplicate $templateTemplateIdDuplicate;
  public Services\TemplateTemplateIdDocumentDocumentId $templateTemplateIdDocumentDocumentId;
  public Services\TemplateTemplateIdDocument $templateTemplateIdDocument;
  public Services\TemplateTemplateIdDocuments $templateTemplateIdDocuments;
  public Services\TemplateTemplateIdSigningSteps $templateTemplateIdSigningSteps;
  public Services\TemplateTemplateIdRename $templateTemplateIdRename;
  public Services\TemplateTemplateIdSetComment $templateTemplateIdSetComment;
  public Services\TemplateTemplateIdSetNotification $templateTemplateIdSetNotification;
  public Services\TemplateTemplateIdAnnotationsDocumentId $templateTemplateIdAnnotationsDocumentId;
  public Services\TemplateTemplateIdAnnotations $templateTemplateIdAnnotations;
  public Services\TemplateTemplateIdAnnotationAnnotationId $templateTemplateIdAnnotationAnnotationId;
  public Services\TemplateTemplateIdAnnotation $templateTemplateIdAnnotation;
  public Services\TemplateTemplateIdAttachmentsSettings $templateTemplateIdAttachmentsSettings;
  public Services\TemplateTemplateIdAttachmentsPlaceholders $templateTemplateIdAttachmentsPlaceholders;
  public Services\TemplateTemplateId $templateTemplateId;
  public Services\Template $template;
  public Services\Templates $templates;
  public Services\WebhookId $webhookId;
  public Services\Webhook $webhook;
  public Services\Webhooks $webhooks;

  public function __construct(
    string $accessToken,
    string $tokenPrefix = 'Bearer ',
    string $environment = Environment::Default,
    float $timeout = 10000,
    array $retryConfig = []
  ) {
    $this->templateId = new Services\TemplateId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->signedDocuments = new Services\SignedDocuments(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->certificate = new Services\Certificate(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->documentId = new Services\DocumentId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->document = new Services\Document(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->documents = new Services\Documents(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->dynamicFields = new Services\DynamicFields(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->signingSteps = new Services\SigningSteps(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->settings = new Services\Settings(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->placeholders = new Services\Placeholders(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->fileId = new Services\FileId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->send = new Services\Send(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->duplicate = new Services\Duplicate(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->void_ = new Services\Void_(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->rename = new Services\Rename(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->setComment = new Services\SetComment(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->setNotification = new Services\SetNotification(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->setExpirationDate = new Services\SetExpirationDate(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->setLegalityLevel = new Services\SetLegalityLevel(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->envelopeEnvelopeIdAnnotationsDocumentId = new Services\EnvelopeEnvelopeIdAnnotationsDocumentId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->annotations = new Services\Annotations(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->annotationId = new Services\AnnotationId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->annotation = new Services\Annotation(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->envelopeId = new Services\EnvelopeId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->envelope = new Services\Envelope(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->envelopes = new Services\Envelopes(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdDuplicate = new Services\TemplateTemplateIdDuplicate(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdDocumentDocumentId = new Services\TemplateTemplateIdDocumentDocumentId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdDocument = new Services\TemplateTemplateIdDocument(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdDocuments = new Services\TemplateTemplateIdDocuments(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdSigningSteps = new Services\TemplateTemplateIdSigningSteps(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdRename = new Services\TemplateTemplateIdRename(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdSetComment = new Services\TemplateTemplateIdSetComment(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdSetNotification = new Services\TemplateTemplateIdSetNotification(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAnnotationsDocumentId = new Services\TemplateTemplateIdAnnotationsDocumentId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAnnotations = new Services\TemplateTemplateIdAnnotations(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAnnotationAnnotationId = new Services\TemplateTemplateIdAnnotationAnnotationId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAnnotation = new Services\TemplateTemplateIdAnnotation(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAttachmentsSettings = new Services\TemplateTemplateIdAttachmentsSettings(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateIdAttachmentsPlaceholders = new Services\TemplateTemplateIdAttachmentsPlaceholders(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templateTemplateId = new Services\TemplateTemplateId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->template = new Services\Template(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->templates = new Services\Templates(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->webhookId = new Services\WebhookId(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->webhook = new Services\Webhook(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
    $this->webhooks = new Services\Webhooks(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig
    );
  }

  /**
   * Set the base URL for all API requests.
   *
   * This method updates the base URL for all service instances managed by this client.
   * Useful for switching between different environments or API versions at runtime.
   *
   * @param string $url The new base URL (e.g., 'https://api.example.com/v2')
   * @return void
   */
  public function setBaseUrl(string $url): void
  {
    $this->templateId->setBaseUrl($url);
    $this->signedDocuments->setBaseUrl($url);
    $this->certificate->setBaseUrl($url);
    $this->documentId->setBaseUrl($url);
    $this->document->setBaseUrl($url);
    $this->documents->setBaseUrl($url);
    $this->dynamicFields->setBaseUrl($url);
    $this->signingSteps->setBaseUrl($url);
    $this->settings->setBaseUrl($url);
    $this->placeholders->setBaseUrl($url);
    $this->fileId->setBaseUrl($url);
    $this->send->setBaseUrl($url);
    $this->duplicate->setBaseUrl($url);
    $this->void_->setBaseUrl($url);
    $this->rename->setBaseUrl($url);
    $this->setComment->setBaseUrl($url);
    $this->setNotification->setBaseUrl($url);
    $this->setExpirationDate->setBaseUrl($url);
    $this->setLegalityLevel->setBaseUrl($url);
    $this->envelopeEnvelopeIdAnnotationsDocumentId->setBaseUrl($url);
    $this->annotations->setBaseUrl($url);
    $this->annotationId->setBaseUrl($url);
    $this->annotation->setBaseUrl($url);
    $this->envelopeId->setBaseUrl($url);
    $this->envelope->setBaseUrl($url);
    $this->envelopes->setBaseUrl($url);
    $this->templateTemplateIdDuplicate->setBaseUrl($url);
    $this->templateTemplateIdDocumentDocumentId->setBaseUrl($url);
    $this->templateTemplateIdDocument->setBaseUrl($url);
    $this->templateTemplateIdDocuments->setBaseUrl($url);
    $this->templateTemplateIdSigningSteps->setBaseUrl($url);
    $this->templateTemplateIdRename->setBaseUrl($url);
    $this->templateTemplateIdSetComment->setBaseUrl($url);
    $this->templateTemplateIdSetNotification->setBaseUrl($url);
    $this->templateTemplateIdAnnotationsDocumentId->setBaseUrl($url);
    $this->templateTemplateIdAnnotations->setBaseUrl($url);
    $this->templateTemplateIdAnnotationAnnotationId->setBaseUrl($url);
    $this->templateTemplateIdAnnotation->setBaseUrl($url);
    $this->templateTemplateIdAttachmentsSettings->setBaseUrl($url);
    $this->templateTemplateIdAttachmentsPlaceholders->setBaseUrl($url);
    $this->templateTemplateId->setBaseUrl($url);
    $this->template->setBaseUrl($url);
    $this->templates->setBaseUrl($url);
    $this->webhookId->setBaseUrl($url);
    $this->webhook->setBaseUrl($url);
    $this->webhooks->setBaseUrl($url);
  }

  /**
   * Configure authentication credentials for API requests.
   *
   * This method sets up the authentication mechanism used by all services.
   * Call this method before making any authenticated API requests.
   *
   * @return void
   */
  public function setAccessToken(string $accessToken): void
  {
    $this->templateId->setAccessToken($accessToken);
    $this->signedDocuments->setAccessToken($accessToken);
    $this->certificate->setAccessToken($accessToken);
    $this->documentId->setAccessToken($accessToken);
    $this->document->setAccessToken($accessToken);
    $this->documents->setAccessToken($accessToken);
    $this->dynamicFields->setAccessToken($accessToken);
    $this->signingSteps->setAccessToken($accessToken);
    $this->settings->setAccessToken($accessToken);
    $this->placeholders->setAccessToken($accessToken);
    $this->fileId->setAccessToken($accessToken);
    $this->send->setAccessToken($accessToken);
    $this->duplicate->setAccessToken($accessToken);
    $this->void_->setAccessToken($accessToken);
    $this->rename->setAccessToken($accessToken);
    $this->setComment->setAccessToken($accessToken);
    $this->setNotification->setAccessToken($accessToken);
    $this->setExpirationDate->setAccessToken($accessToken);
    $this->setLegalityLevel->setAccessToken($accessToken);
    $this->envelopeEnvelopeIdAnnotationsDocumentId->setAccessToken($accessToken);
    $this->annotations->setAccessToken($accessToken);
    $this->annotationId->setAccessToken($accessToken);
    $this->annotation->setAccessToken($accessToken);
    $this->envelopeId->setAccessToken($accessToken);
    $this->envelope->setAccessToken($accessToken);
    $this->envelopes->setAccessToken($accessToken);
    $this->templateTemplateIdDuplicate->setAccessToken($accessToken);
    $this->templateTemplateIdDocumentDocumentId->setAccessToken($accessToken);
    $this->templateTemplateIdDocument->setAccessToken($accessToken);
    $this->templateTemplateIdDocuments->setAccessToken($accessToken);
    $this->templateTemplateIdSigningSteps->setAccessToken($accessToken);
    $this->templateTemplateIdRename->setAccessToken($accessToken);
    $this->templateTemplateIdSetComment->setAccessToken($accessToken);
    $this->templateTemplateIdSetNotification->setAccessToken($accessToken);
    $this->templateTemplateIdAnnotationsDocumentId->setAccessToken($accessToken);
    $this->templateTemplateIdAnnotations->setAccessToken($accessToken);
    $this->templateTemplateIdAnnotationAnnotationId->setAccessToken($accessToken);
    $this->templateTemplateIdAnnotation->setAccessToken($accessToken);
    $this->templateTemplateIdAttachmentsSettings->setAccessToken($accessToken);
    $this->templateTemplateIdAttachmentsPlaceholders->setAccessToken($accessToken);
    $this->templateTemplateId->setAccessToken($accessToken);
    $this->template->setAccessToken($accessToken);
    $this->templates->setAccessToken($accessToken);
    $this->webhookId->setAccessToken($accessToken);
    $this->webhook->setAccessToken($accessToken);
    $this->webhooks->setAccessToken($accessToken);
  }
}

// c029837e0e474b76bc487506e8799df5e3335891efe4fb02bda7a1441840310c
