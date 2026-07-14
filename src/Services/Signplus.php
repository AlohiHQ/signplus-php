<?php

declare(strict_types=1);

namespace Signplus\Services;

use Signplus\Utils\Serializer;
use Signplus\Models;

/**
 * Service class containing API endpoint methods.
 *
 * This class extends the base service to provide typed methods for specific API operations.
 * Each method corresponds to an API endpoint and handles request serialization,
 * execution, and response deserialization.
 */
class Signplus extends BaseService
{
  /** @var array|null Method-level configuration for createEnvelope */
  protected ?array $createEnvelopeConfig = null;

  /** @var array|null Method-level configuration for createEnvelopeFromTemplate */
  protected ?array $createEnvelopeFromTemplateConfig = null;

  /** @var array|null Method-level configuration for listEnvelopes */
  protected ?array $listEnvelopesConfig = null;

  /** @var array|null Method-level configuration for getEnvelope */
  protected ?array $getEnvelopeConfig = null;

  /** @var array|null Method-level configuration for deleteEnvelope */
  protected ?array $deleteEnvelopeConfig = null;

  /** @var array|null Method-level configuration for downloadEnvelopeSignedDocuments */
  protected ?array $downloadEnvelopeSignedDocumentsConfig = null;

  /** @var array|null Method-level configuration for downloadEnvelopeCertificate */
  protected ?array $downloadEnvelopeCertificateConfig = null;

  /** @var array|null Method-level configuration for getEnvelopeDocument */
  protected ?array $getEnvelopeDocumentConfig = null;

  /** @var array|null Method-level configuration for getEnvelopeDocuments */
  protected ?array $getEnvelopeDocumentsConfig = null;

  /** @var array|null Method-level configuration for addEnvelopeDocument */
  protected ?array $addEnvelopeDocumentConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeDynamicFields */
  protected ?array $setEnvelopeDynamicFieldsConfig = null;

  /** @var array|null Method-level configuration for addEnvelopeSigningSteps */
  protected ?array $addEnvelopeSigningStepsConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeAttachmentsSettings */
  protected ?array $setEnvelopeAttachmentsSettingsConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeAttachmentsPlaceholders */
  protected ?array $setEnvelopeAttachmentsPlaceholdersConfig = null;

  /** @var array|null Method-level configuration for getAttachmentFile */
  protected ?array $getAttachmentFileConfig = null;

  /** @var array|null Method-level configuration for sendEnvelope */
  protected ?array $sendEnvelopeConfig = null;

  /** @var array|null Method-level configuration for duplicateEnvelope */
  protected ?array $duplicateEnvelopeConfig = null;

  /** @var array|null Method-level configuration for voidEnvelope */
  protected ?array $voidEnvelopeConfig = null;

  /** @var array|null Method-level configuration for renameEnvelope */
  protected ?array $renameEnvelopeConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeComment */
  protected ?array $setEnvelopeCommentConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeNotification */
  protected ?array $setEnvelopeNotificationConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeExpirationDate */
  protected ?array $setEnvelopeExpirationDateConfig = null;

  /** @var array|null Method-level configuration for setEnvelopeLegalityLevel */
  protected ?array $setEnvelopeLegalityLevelConfig = null;

  /** @var array|null Method-level configuration for getEnvelopeAnnotations */
  protected ?array $getEnvelopeAnnotationsConfig = null;

  /** @var array|null Method-level configuration for getEnvelopeDocumentAnnotations */
  protected ?array $getEnvelopeDocumentAnnotationsConfig = null;

  /** @var array|null Method-level configuration for addEnvelopeAnnotation */
  protected ?array $addEnvelopeAnnotationConfig = null;

  /** @var array|null Method-level configuration for deleteEnvelopeAnnotation */
  protected ?array $deleteEnvelopeAnnotationConfig = null;

  /** @var array|null Method-level configuration for createTemplate */
  protected ?array $createTemplateConfig = null;

  /** @var array|null Method-level configuration for listTemplates */
  protected ?array $listTemplatesConfig = null;

  /** @var array|null Method-level configuration for getTemplate */
  protected ?array $getTemplateConfig = null;

  /** @var array|null Method-level configuration for deleteTemplate */
  protected ?array $deleteTemplateConfig = null;

  /** @var array|null Method-level configuration for duplicateTemplate */
  protected ?array $duplicateTemplateConfig = null;

  /** @var array|null Method-level configuration for addTemplateDocument */
  protected ?array $addTemplateDocumentConfig = null;

  /** @var array|null Method-level configuration for getTemplateDocument */
  protected ?array $getTemplateDocumentConfig = null;

  /** @var array|null Method-level configuration for getTemplateDocuments */
  protected ?array $getTemplateDocumentsConfig = null;

  /** @var array|null Method-level configuration for addTemplateSigningSteps */
  protected ?array $addTemplateSigningStepsConfig = null;

  /** @var array|null Method-level configuration for renameTemplate */
  protected ?array $renameTemplateConfig = null;

  /** @var array|null Method-level configuration for setTemplateComment */
  protected ?array $setTemplateCommentConfig = null;

  /** @var array|null Method-level configuration for setTemplateNotification */
  protected ?array $setTemplateNotificationConfig = null;

  /** @var array|null Method-level configuration for getTemplateAnnotations */
  protected ?array $getTemplateAnnotationsConfig = null;

  /** @var array|null Method-level configuration for getDocumentTemplateAnnotations */
  protected ?array $getDocumentTemplateAnnotationsConfig = null;

  /** @var array|null Method-level configuration for addTemplateAnnotation */
  protected ?array $addTemplateAnnotationConfig = null;

  /** @var array|null Method-level configuration for deleteTemplateAnnotation */
  protected ?array $deleteTemplateAnnotationConfig = null;

  /** @var array|null Method-level configuration for setTemplateAttachmentsSettings */
  protected ?array $setTemplateAttachmentsSettingsConfig = null;

  /** @var array|null Method-level configuration for setTemplateAttachmentsPlaceholders */
  protected ?array $setTemplateAttachmentsPlaceholdersConfig = null;

  /** @var array|null Method-level configuration for createWebhook */
  protected ?array $createWebhookConfig = null;

  /** @var array|null Method-level configuration for listWebhooks */
  protected ?array $listWebhooksConfig = null;

  /** @var array|null Method-level configuration for deleteWebhook */
  protected ?array $deleteWebhookConfig = null;

  /**
   * Set method-level configuration for createEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateEnvelopeConfig(array $config): static
  {
    $this->createEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for createEnvelopeFromTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateEnvelopeFromTemplateConfig(array $config): static
  {
    $this->createEnvelopeFromTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for listEnvelopes.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setListEnvelopesConfig(array $config): static
  {
    $this->listEnvelopesConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeConfig(array $config): static
  {
    $this->getEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteEnvelopeConfig(array $config): static
  {
    $this->deleteEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for downloadEnvelopeSignedDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDownloadEnvelopeSignedDocumentsConfig(array $config): static
  {
    $this->downloadEnvelopeSignedDocumentsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for downloadEnvelopeCertificate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDownloadEnvelopeCertificateConfig(array $config): static
  {
    $this->downloadEnvelopeCertificateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getEnvelopeDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentConfig(array $config): static
  {
    $this->getEnvelopeDocumentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getEnvelopeDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentsConfig(array $config): static
  {
    $this->getEnvelopeDocumentsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addEnvelopeDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeDocumentConfig(array $config): static
  {
    $this->addEnvelopeDocumentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeDynamicFields.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeDynamicFieldsConfig(array $config): static
  {
    $this->setEnvelopeDynamicFieldsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addEnvelopeSigningSteps.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeSigningStepsConfig(array $config): static
  {
    $this->addEnvelopeSigningStepsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeAttachmentsSettings.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeAttachmentsSettingsConfig(array $config): static
  {
    $this->setEnvelopeAttachmentsSettingsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeAttachmentsPlaceholders.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeAttachmentsPlaceholdersConfig(array $config): static
  {
    $this->setEnvelopeAttachmentsPlaceholdersConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getAttachmentFile.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetAttachmentFileConfig(array $config): static
  {
    $this->getAttachmentFileConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for sendEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSendEnvelopeConfig(array $config): static
  {
    $this->sendEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for duplicateEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDuplicateEnvelopeConfig(array $config): static
  {
    $this->duplicateEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for voidEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setVoidEnvelopeConfig(array $config): static
  {
    $this->voidEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for renameEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setRenameEnvelopeConfig(array $config): static
  {
    $this->renameEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeComment.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeCommentConfig(array $config): static
  {
    $this->setEnvelopeCommentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeNotification.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeNotificationConfig(array $config): static
  {
    $this->setEnvelopeNotificationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeExpirationDate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeExpirationDateConfig(array $config): static
  {
    $this->setEnvelopeExpirationDateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setEnvelopeLegalityLevel.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeLegalityLevelConfig(array $config): static
  {
    $this->setEnvelopeLegalityLevelConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getEnvelopeAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeAnnotationsConfig(array $config): static
  {
    $this->getEnvelopeAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getEnvelopeDocumentAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentAnnotationsConfig(array $config): static
  {
    $this->getEnvelopeDocumentAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addEnvelopeAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeAnnotationConfig(array $config): static
  {
    $this->addEnvelopeAnnotationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteEnvelopeAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteEnvelopeAnnotationConfig(array $config): static
  {
    $this->deleteEnvelopeAnnotationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for createTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateTemplateConfig(array $config): static
  {
    $this->createTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for listTemplates.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setListTemplatesConfig(array $config): static
  {
    $this->listTemplatesConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateConfig(array $config): static
  {
    $this->getTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteTemplateConfig(array $config): static
  {
    $this->deleteTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for duplicateTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDuplicateTemplateConfig(array $config): static
  {
    $this->duplicateTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addTemplateDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateDocumentConfig(array $config): static
  {
    $this->addTemplateDocumentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getTemplateDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateDocumentConfig(array $config): static
  {
    $this->getTemplateDocumentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getTemplateDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateDocumentsConfig(array $config): static
  {
    $this->getTemplateDocumentsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addTemplateSigningSteps.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateSigningStepsConfig(array $config): static
  {
    $this->addTemplateSigningStepsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for renameTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setRenameTemplateConfig(array $config): static
  {
    $this->renameTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setTemplateComment.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateCommentConfig(array $config): static
  {
    $this->setTemplateCommentConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setTemplateNotification.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateNotificationConfig(array $config): static
  {
    $this->setTemplateNotificationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getTemplateAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateAnnotationsConfig(array $config): static
  {
    $this->getTemplateAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for getDocumentTemplateAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetDocumentTemplateAnnotationsConfig(array $config): static
  {
    $this->getDocumentTemplateAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for addTemplateAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateAnnotationConfig(array $config): static
  {
    $this->addTemplateAnnotationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteTemplateAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteTemplateAnnotationConfig(array $config): static
  {
    $this->deleteTemplateAnnotationConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setTemplateAttachmentsSettings.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateAttachmentsSettingsConfig(array $config): static
  {
    $this->setTemplateAttachmentsSettingsConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for setTemplateAttachmentsPlaceholders.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateAttachmentsPlaceholdersConfig(array $config): static
  {
    $this->setTemplateAttachmentsPlaceholdersConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for createWebhook.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateWebhookConfig(array $config): static
  {
    $this->createWebhookConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for listWebhooks.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setListWebhooksConfig(array $config): static
  {
    $this->listWebhooksConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteWebhook.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteWebhookConfig(array $config): static
  {
    $this->deleteWebhookConfig = $config;
    return $this;
  }

  /**
   * Create new envelope
   *
   * @param Models\CreateEnvelopeRequest $input Request body
   * @return Models\Envelope
   */
  public function createEnvelope(
    Models\CreateEnvelopeRequest $input,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig($this->createEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('post', '/envelope', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Create new envelope from template
   *
   * @param Models\CreateEnvelopeFromTemplateRequest $input Request body
   * @param string $templateId
   * @return Models\Envelope
   */
  public function createEnvelopeFromTemplate(
    Models\CreateEnvelopeFromTemplateRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->createEnvelopeFromTemplateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/envelope/from_template/{$templateId}",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * List envelopes
   *
   * @param ?Models\ListEnvelopesRequest $input Request body
   * @return Models\ListEnvelopesResponse
   */
  public function listEnvelopes(
    ?Models\ListEnvelopesRequest $input = null,
    array $requestConfig = []
  ): Models\ListEnvelopesResponse {
    $resolvedConfig = $this->getResolvedConfig($this->listEnvelopesConfig, $requestConfig);
    $response = $this->sendRequest('post', '/envelopes', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListEnvelopesResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get envelope
   *
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function getEnvelope(string $envelopeId, array $requestConfig = []): Models\Envelope
  {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('get', "/envelope/{$envelopeId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Delete envelope
   *
   * @param string $envelopeId
   * @return mixed
   */
  public function deleteEnvelope(string $envelopeId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/envelope/{$envelopeId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = $this->decodeJson($data);

    return $result;
  }

  /**
   * Download signed documents for an envelope
   *
   * @param string $envelopeId ID of the envelope
   * @param ?bool $certificateOfCompletion Whether to include the certificate of completion in the downloaded file
   * @return mixed
   */
  public function downloadEnvelopeSignedDocuments(
    string $envelopeId,
    ?bool $certificateOfCompletion = null,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->downloadEnvelopeSignedDocumentsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/signed_documents",
      [
        'query' => [
          'certificate_of_completion' => $certificateOfCompletion
        ]
      ],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return $data;
  }

  /**
   * Download certificate of completion for an envelope
   *
   * @param string $envelopeId ID of the envelope
   * @return mixed
   */
  public function downloadEnvelopeCertificate(string $envelopeId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig(
      $this->downloadEnvelopeCertificateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/certificate",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return $data;
  }

  /**
   * Get envelope document
   *
   * @param string $envelopeId
   * @param string $documentId
   * @return Models\Document
   */
  public function getEnvelopeDocument(
    string $envelopeId,
    string $documentId,
    array $requestConfig = []
  ): Models\Document {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/document/{$documentId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Document::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get envelope documents
   *
   * @param string $envelopeId
   * @return Models\ListEnvelopeDocumentsResponse
   */
  public function getEnvelopeDocuments(
    string $envelopeId,
    array $requestConfig = []
  ): Models\ListEnvelopeDocumentsResponse {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeDocumentsConfig, $requestConfig);
    $response = $this->sendRequest('get', "/envelope/{$envelopeId}/documents", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListEnvelopeDocumentsResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add envelope document
   *
   * @param Models\AddEnvelopeDocumentRequest $input Request body
   * @param string $envelopeId
   * @return Models\Document
   */
  public function addEnvelopeDocument(
    Models\AddEnvelopeDocumentRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Document {
    $resolvedConfig = $this->getResolvedConfig($this->addEnvelopeDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/document",
      ['multipart' => $input->toMultipart()],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Document::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope dynamic fields
   *
   * @param Models\SetEnvelopeDynamicFieldsRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function setEnvelopeDynamicFields(
    Models\SetEnvelopeDynamicFieldsRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeDynamicFieldsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/dynamic_fields",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add envelope signing steps
   *
   * @param Models\AddEnvelopeSigningStepsRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function addEnvelopeSigningSteps(
    Models\AddEnvelopeSigningStepsRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->addEnvelopeSigningStepsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/signing_steps",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope attachment settings
   *
   * @param Models\SetEnvelopeAttachmentsSettingsRequest $input Request body
   * @param string $envelopeId
   * @return Models\EnvelopeAttachments
   */
  public function setEnvelopeAttachmentsSettings(
    Models\SetEnvelopeAttachmentsSettingsRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\EnvelopeAttachments {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeAttachmentsSettingsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/attachments/settings",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\EnvelopeAttachments::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Placeholders to be set, completely replacing the existing ones.
   *
   * @param Models\SetEnvelopeAttachmentsPlaceholdersRequest $input Request body
   * @param string $envelopeId
   * @return Models\EnvelopeAttachments
   */
  public function setEnvelopeAttachmentsPlaceholders(
    Models\SetEnvelopeAttachmentsPlaceholdersRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\EnvelopeAttachments {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeAttachmentsPlaceholdersConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/attachments/placeholders",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\EnvelopeAttachments::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get envelope attachment file
   *
   * @param string $envelopeId
   * @param string $fileId
   * @return mixed
   */
  public function getAttachmentFile(
    string $envelopeId,
    string $fileId,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getAttachmentFileConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/attachments/{$fileId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return $data;
  }

  /**
   * Send envelope for signature
   *
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function sendEnvelope(string $envelopeId, array $requestConfig = []): Models\Envelope
  {
    $resolvedConfig = $this->getResolvedConfig($this->sendEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('post', "/envelope/{$envelopeId}/send", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Duplicate envelope
   *
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function duplicateEnvelope(string $envelopeId, array $requestConfig = []): Models\Envelope
  {
    $resolvedConfig = $this->getResolvedConfig($this->duplicateEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/duplicate",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Void envelope
   *
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function voidEnvelope(string $envelopeId, array $requestConfig = []): Models\Envelope
  {
    $resolvedConfig = $this->getResolvedConfig($this->voidEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('put', "/envelope/{$envelopeId}/void", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Rename envelope
   *
   * @param Models\RenameEnvelopeRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function renameEnvelope(
    Models\RenameEnvelopeRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig($this->renameEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/rename",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope comment
   *
   * @param Models\SetEnvelopeCommentRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function setEnvelopeComment(
    Models\SetEnvelopeCommentRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig($this->setEnvelopeCommentConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_comment",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope notification
   *
   * @param Models\EnvelopeNotification $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function setEnvelopeNotification(
    Models\EnvelopeNotification $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeNotificationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_notification",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope expiration date
   *
   * @param Models\SetEnvelopeExpirationRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function setEnvelopeExpirationDate(
    Models\SetEnvelopeExpirationRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeExpirationDateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_expiration_date",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set envelope legality level
   *
   * @param Models\SetEnvelopeLegalityLevelRequest $input Request body
   * @param string $envelopeId
   * @return Models\Envelope
   */
  public function setEnvelopeLegalityLevel(
    Models\SetEnvelopeLegalityLevelRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Envelope {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeLegalityLevelConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_legality_level",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Envelope::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get envelope annotations
   *
   * @param string $envelopeId ID of the envelope
   * @return array
   */
  public function getEnvelopeAnnotations(string $envelopeId, array $requestConfig = []): array
  {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeAnnotationsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/annotations",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Annotation::class . '[]');

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      foreach ($result as $item) {
        $item?->validate();
      }
    }
    return $result;
  }

  /**
   * Get envelope document annotations
   *
   * @param string $envelopeId ID of the envelope
   * @param string $documentId ID of document
   * @return Models\ListEnvelopeDocumentAnnotationsResponse
   */
  public function getEnvelopeDocumentAnnotations(
    string $envelopeId,
    string $documentId,
    array $requestConfig = []
  ): Models\ListEnvelopeDocumentAnnotationsResponse {
    $resolvedConfig = $this->getResolvedConfig(
      $this->getEnvelopeDocumentAnnotationsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/annotations/{$documentId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListEnvelopeDocumentAnnotationsResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add envelope annotation
   *
   * @param Models\AddAnnotationRequest $input Request body
   * @param string $envelopeId ID of the envelope
   * @return Models\Annotation
   */
  public function addEnvelopeAnnotation(
    Models\AddAnnotationRequest $input,
    string $envelopeId,
    array $requestConfig = []
  ): Models\Annotation {
    $resolvedConfig = $this->getResolvedConfig($this->addEnvelopeAnnotationConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/annotation",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Annotation::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Delete envelope annotation
   *
   * @param string $envelopeId ID of the envelope
   * @param string $annotationId ID of the annotation to delete
   * @return mixed
   */
  public function deleteEnvelopeAnnotation(
    string $envelopeId,
    string $annotationId,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->deleteEnvelopeAnnotationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'delete',
      "/envelope/{$envelopeId}/annotation/{$annotationId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = $this->decodeJson($data);

    return $result;
  }

  /**
   * Create new template
   *
   * @param Models\CreateTemplateRequest $input Request body
   * @return Models\Template
   */
  public function createTemplate(
    Models\CreateTemplateRequest $input,
    array $requestConfig = []
  ): Models\Template {
    $resolvedConfig = $this->getResolvedConfig($this->createTemplateConfig, $requestConfig);
    $response = $this->sendRequest('post', '/template', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * List templates
   *
   * @param ?Models\ListTemplatesRequest $input Request body
   * @return Models\ListTemplatesResponse
   */
  public function listTemplates(
    ?Models\ListTemplatesRequest $input = null,
    array $requestConfig = []
  ): Models\ListTemplatesResponse {
    $resolvedConfig = $this->getResolvedConfig($this->listTemplatesConfig, $requestConfig);
    $response = $this->sendRequest('post', '/templates', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListTemplatesResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get template
   *
   * @param string $templateId
   * @return Models\Template
   */
  public function getTemplate(string $templateId, array $requestConfig = []): Models\Template
  {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateConfig, $requestConfig);
    $response = $this->sendRequest('get', "/template/{$templateId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Delete template
   *
   * @param string $templateId
   * @return mixed
   */
  public function deleteTemplate(string $templateId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteTemplateConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/template/{$templateId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = $this->decodeJson($data);

    return $result;
  }

  /**
   * Duplicate template
   *
   * @param string $templateId
   * @return Models\Template
   */
  public function duplicateTemplate(string $templateId, array $requestConfig = []): Models\Template
  {
    $resolvedConfig = $this->getResolvedConfig($this->duplicateTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/duplicate",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add template document
   *
   * @param Models\AddTemplateDocumentRequest $input Request body
   * @param string $templateId
   * @return Models\Document
   */
  public function addTemplateDocument(
    Models\AddTemplateDocumentRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Document {
    $resolvedConfig = $this->getResolvedConfig($this->addTemplateDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/document",
      ['multipart' => $input->toMultipart()],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Document::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get template document
   *
   * @param string $templateId
   * @param string $documentId
   * @return Models\Document
   */
  public function getTemplateDocument(
    string $templateId,
    string $documentId,
    array $requestConfig = []
  ): Models\Document {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/document/{$documentId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Document::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get template documents
   *
   * @param string $templateId
   * @return Models\ListTemplateDocumentsResponse
   */
  public function getTemplateDocuments(
    string $templateId,
    array $requestConfig = []
  ): Models\ListTemplateDocumentsResponse {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateDocumentsConfig, $requestConfig);
    $response = $this->sendRequest('get', "/template/{$templateId}/documents", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListTemplateDocumentsResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add template signing steps
   *
   * @param Models\AddTemplateSigningStepsRequest $input Request body
   * @param string $templateId
   * @return Models\Template
   */
  public function addTemplateSigningSteps(
    Models\AddTemplateSigningStepsRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Template {
    $resolvedConfig = $this->getResolvedConfig(
      $this->addTemplateSigningStepsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/signing_steps",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Rename template
   *
   * @param Models\RenameTemplateRequest $input Request body
   * @param string $templateId
   * @return Models\Template
   */
  public function renameTemplate(
    Models\RenameTemplateRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Template {
    $resolvedConfig = $this->getResolvedConfig($this->renameTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/rename",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set template comment
   *
   * @param Models\SetTemplateCommentRequest $input Request body
   * @param string $templateId
   * @return Models\Template
   */
  public function setTemplateComment(
    Models\SetTemplateCommentRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Template {
    $resolvedConfig = $this->getResolvedConfig($this->setTemplateCommentConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/set_comment",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Set template notification
   *
   * @param Models\EnvelopeNotification $input Request body
   * @param string $templateId
   * @return Models\Template
   */
  public function setTemplateNotification(
    Models\EnvelopeNotification $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Template {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateNotificationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/set_notification",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Template::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get template annotations
   *
   * @param string $templateId ID of the template
   * @return Models\ListTemplateAnnotationsResponse
   */
  public function getTemplateAnnotations(
    string $templateId,
    array $requestConfig = []
  ): Models\ListTemplateAnnotationsResponse {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateAnnotationsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/annotations",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListTemplateAnnotationsResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Get document template annotations
   *
   * @param string $templateId ID of the template
   * @param string $documentId ID of document
   * @return Models\ListTemplateDocumentAnnotationsResponse
   */
  public function getDocumentTemplateAnnotations(
    string $templateId,
    string $documentId,
    array $requestConfig = []
  ): Models\ListTemplateDocumentAnnotationsResponse {
    $resolvedConfig = $this->getResolvedConfig(
      $this->getDocumentTemplateAnnotationsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/annotations/{$documentId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListTemplateDocumentAnnotationsResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Add template annotation
   *
   * @param Models\AddAnnotationRequest $input Request body
   * @param string $templateId ID of the template
   * @return Models\Annotation
   */
  public function addTemplateAnnotation(
    Models\AddAnnotationRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\Annotation {
    $resolvedConfig = $this->getResolvedConfig($this->addTemplateAnnotationConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/annotation",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Annotation::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Delete template annotation
   *
   * @param string $templateId ID of the template
   * @param string $annotationId ID of the annotation to delete
   * @return mixed
   */
  public function deleteTemplateAnnotation(
    string $templateId,
    string $annotationId,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->deleteTemplateAnnotationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'delete',
      "/template/{$templateId}/annotation/{$annotationId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = $this->decodeJson($data);

    return $result;
  }

  /**
   * Set template attachment settings
   *
   * @param Models\SetEnvelopeAttachmentsSettingsRequest $input Request body
   * @param string $templateId
   * @return Models\EnvelopeAttachments
   */
  public function setTemplateAttachmentsSettings(
    Models\SetEnvelopeAttachmentsSettingsRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\EnvelopeAttachments {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateAttachmentsSettingsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/attachments/settings",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\EnvelopeAttachments::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Placeholders to be set, completely replacing the existing ones.
   *
   * @param Models\SetEnvelopeAttachmentsPlaceholdersRequest $input Request body
   * @param string $templateId
   * @return Models\EnvelopeAttachments
   */
  public function setTemplateAttachmentsPlaceholders(
    Models\SetEnvelopeAttachmentsPlaceholdersRequest $input,
    string $templateId,
    array $requestConfig = []
  ): Models\EnvelopeAttachments {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateAttachmentsPlaceholdersConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/attachments/placeholders",
      ['json' => $input],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\EnvelopeAttachments::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Create webhook
   *
   * @param Models\CreateWebhookRequest $input Request body
   * @return Models\Webhook
   */
  public function createWebhook(
    Models\CreateWebhookRequest $input,
    array $requestConfig = []
  ): Models\Webhook {
    $resolvedConfig = $this->getResolvedConfig($this->createWebhookConfig, $requestConfig);
    $response = $this->sendRequest('post', '/webhook', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\Webhook::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * List webhooks
   *
   * @param ?Models\ListWebhooksRequest $input Request body
   * @return Models\ListWebhooksResponse
   */
  public function listWebhooks(
    ?Models\ListWebhooksRequest $input = null,
    array $requestConfig = []
  ): Models\ListWebhooksResponse {
    $resolvedConfig = $this->getResolvedConfig($this->listWebhooksConfig, $requestConfig);
    $response = $this->sendRequest('post', '/webhooks', ['json' => $input], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = Serializer::deserialize($data, Models\ListWebhooksResponse::class);

    if ($resolvedConfig['enableResponseValidation'] ?? false) {
      $result?->validate();
    }
    return $result;
  }

  /**
   * Delete webhook
   *
   * @param string $webhookId
   * @return mixed
   */
  public function deleteWebhook(string $webhookId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteWebhookConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/webhook/{$webhookId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    $result = $this->decodeJson($data);

    return $result;
  }
}
