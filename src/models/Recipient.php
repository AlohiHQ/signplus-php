<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Recipient
{
    /**
     * Unique identifier of the recipient
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Unique identifier of the user associated with the recipient
     */
    #[SerializedName('uid')]
    public ?string $uid;

    /**
     * Name of the recipient
     */
    #[SerializedName('name')]
    public string $name;

    /**
     * Email of the recipient
     */
    #[SerializedName('email')]
    public string $email;

    /**
     * Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document)
     */
    #[SerializedName('role')]
    public RecipientRole $role;

    #[SerializedName('verification')]
    public ?RecipientVerification $verification;

    public function __construct(
        ?string $id = null,
        ?string $uid = null,
        string $name,
        string $email,
        RecipientRole $role,
        ?RecipientVerification $verification = null
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->verification = $verification;
    }
}
