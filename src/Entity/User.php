<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable {

	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="json")
	 */
	private $roles = [];

	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $fierst_name;

	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $last_name;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $full_name;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $date_birth;

	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $street;

	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $city;

	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	private $post_code;

	/**
	 * @ORM\Column(type="string", length=10, nullable=true)
	 */
	private $country;

	/**
	 * @ORM\Column(type="string", length=10, options={"default":"en"})
	 */
	private $language;

	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	private $phone;

	/**
	 * @ORM\Column(type="string", unique=true, length=50)
	 */
	private $email;

	/**
	 * @ORM\Column(type="string", length=64)
	 */
	private $password;

	/**
	 * @ORM\Column(type="string", length=32)
	 */
	private $salt;

	/**
	 * @ORM\Column(type="boolean", options={"default":false})
	 */
	private $is_active;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $create_date;

	public function getId(): ?int {
		return $this->id;
	}

	public function getRoles(): array {
		$roles = $this->roles;
		$roles[] = 'ROLE_USER';
		return array_unique($roles);
	}

	public function setRoles(array $roles ): self {
		$this->roles = $roles;

		return $this;
	}

	public function getFierstName(): ?string {
		return $this->fierst_name;
	}

	public function setFierstName( string $fierst_name ): self {
		$this->fierst_name = $fierst_name;

		return $this;
	}

	public function getLastName(): ?string {
		return $this->last_name;
	}

	public function setLastName( string $last_name ): self {
		$this->last_name = $last_name;

		return $this;
	}

	public function getFullName(): ?string {
		return $this->full_name;
	}

	public function setFullName( string $full_name ): self {
		$this->full_name = $full_name;

		return $this;
	}

	public function getDateBirth(): ?\DateTimeInterface {
		return $this->date_birth;
	}

	public function setDateBirth( \DateTimeInterface $date_birth ): self {
		$this->date_birth = $date_birth;

		return $this;
	}

	public function getStreet(): ?string {
		return $this->street;
	}

	public function setStreet( string $street ): self {
		$this->street = $street;

		return $this;
	}

	public function getCity(): ?string {
		return $this->city;
	}

	public function setCity( string $city ): self {
		$this->city = $city;

		return $this;
	}

	public function getPostCode(): ?string {
		return $this->post_code;
	}

	public function setPostCode( string $post_code ): self {
		$this->post_code = $post_code;

		return $this;
	}

	public function getCountry(): ?string {
		return $this->country;
	}

	public function setCountry( string $country ): self {
		$this->country = $country;

		return $this;
	}

	public function getLanguage(): ?string {
		return $this->language;
	}

	public function setLanguage( string $language ): self {
		$this->language = $language;

		return $this;
	}

	public function getPhone(): ?string {
		return $this->phone;
	}

	public function setPhone( string $phone ): self {
		$this->phone = $phone;

		return $this;
	}

	public function getEmail(): ?string {
		return $this->email;
	}

	public function setEmail( string $email ): self {
		$this->email = $email;

		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword( string $password ): self {
		$this->password = $password;

		return $this;
	}

	public function getSalt(): string {
		return $this->salt;
	}

	public function setSalt( string $salt ): self {
		$this->salt = $salt;

		return $this;
	}

	public function getIsActive(): ?bool {
		return $this->is_active;
	}

	public function setIsActive( bool $is_active ): self {
		$this->is_active = $is_active;

		return $this;
	}

	public function getCreateDate(): ?\DateTimeInterface {
		return $this->create_date;
	}

	public function setCreateDate( \DateTimeInterface $create_date ): self {
		$this->create_date = $create_date;

		return $this;
	}

	public function serialize() {
		return serialize(array(
			$this->id,
			$this->email,
			$this->password,
			$this->salt,
		));
	}

	public function unserialize( $serialized ) {
		list (
			$this->id,
			$this->email,
			$this->password,
			$this->salt
			) = unserialize($serialized);
	}

	public function getUsername() {
		return $this->getEmail();
	}

	public function eraseCredentials() {
		// TODO: Implement eraseCredentials() method.
	}
}
