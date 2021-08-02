<?php


namespace App\Utilities;


use Doctrine\ORM\Mapping as ORM;

trait TimeStampTrait
{

    /**
     * @var
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @var
     * @ORM\Column(type="date")
     */
    private $deletedAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt(){
        return $this->deletedAt;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt){
        $this->deletedAt = $deletedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPersist(){
        $this->setCreatedAt(new \DateTime("NOW"));
    }

    /**
     * @ORM\PreRemove
     */
    public function onRemove(){
        $this->setDeletedAt(new \DateTime("NOW"));
    }



}