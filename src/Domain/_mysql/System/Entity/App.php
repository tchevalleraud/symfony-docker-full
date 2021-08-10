<?php
    namespace App\Domain\_mysql\System\Entity;

    use App\Domain\_mysql\System\Repository\AppRepository;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass=AppRepository::class)
     */
    class App {

        /**
         * @ORM\Id
         * @ORM\Column(type="string")
         * @ORM\GeneratedValue(strategy="UUID")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $icon;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $name;

        /**
         * @ORM\Column(type="string", length=255, unique=true)
         */
        private $apiKey;

        public function getId() {
            return $this->id;
        }

        public function getIcon() {
            return $this->icon;
        }

        public function setIcon($icon): self {
            $this->icon = $icon;
            return $this;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name): self {
            $this->name = $name;
            return $this;
        }

        public function getApiKey() {
            return $this->apiKey;
        }

        public function setApiKey($apiKey): self {
            $this->apiKey = $apiKey;
            return $this;
        }

    }