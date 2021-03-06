<?php
    namespace App\Domain\_mysql\System\Entity;

    use App\Domain\_mysql\System\Repository\UserRepository;
    use Doctrine\ORM\Mapping as ORM;
    use OpenApi\Annotations as OA;
    use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * @ORM\Entity(repositoryClass=UserRepository::class)
     * @OA\Schema()
     */
    class User implements UserInterface, PasswordAuthenticatedUserInterface {

        /**
         * @ORM\Id
         * @ORM\Column(type="string")
         * @ORM\GeneratedValue(strategy="UUID")
         * @OA\Property(type="string")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=180, unique=true)
         * @OA\Property(type="string")
         */
        private $email;

        /**
         * @ORM\Column(type="json")
         * @OA\Property(type="array", @OA\Items())
         */
        private $roles = [];

        /**
         * @var string The hashed password
         * @ORM\Column(type="string")
         * @OA\Property(type="string")
         */
        private $password;

        /**
         * @ORM\Column(type="string", unique=true, nullable=true)
         * @OA\Property(type="string")
         */
        private $apiToken;

        public function getId(): ?int {
            return $this->id;
        }

        public function getEmail(): ?string {
            return $this->email;
        }

        public function setEmail(string $email): self {
            $this->email = $email;
            return $this;
        }

        /**
         * A visual identifier that represents this user.
         *
         * @see UserInterface
         */
        public function getUserIdentifier(): string {
            return (string) $this->email;
        }

        /**
         * @deprecated since Symfony 5.3, use getUserIdentifier instead
         */
        public function getUsername(): string {
            return (string) $this->email;
        }

        /**
         * @see UserInterface
         */
        public function getRoles(): array {
            $roles = $this->roles;
            $roles[] = 'ROLE_USER';
            return array_unique($roles);
        }

        public function setRoles(array $roles): self {
            $this->roles = $roles;
            return $this;
        }

        /**
         * @see PasswordAuthenticatedUserInterface
         */
        public function getPassword(): string {
            return $this->password;
        }

        public function setPassword(string $password): self {
            $this->password = $password;
            return $this;
        }

        /**
         * Returning a salt is only needed, if you are not using a modern
         * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
         *
         * @see UserInterface
         */
        public function getSalt(): ?string {
            return null;
        }

        public function getApiToken(): string {
            return $this->apiToken;
        }

        public function setApiToken(string $apiToken): self {
            $this->apiToken = $apiToken;
            return $this;
        }

        /**
         * @see UserInterface
         */
        public function eraseCredentials() {
            // If you store any temporary, sensitive data on the user, clear it here
            // $this->plainPassword = null;
        }

    }
