<?php

namespace ISL\CrearchitexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Categories
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="ISL\CrearchitexBundle\Repository\CategoriesRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var projet
     *
     * @ORM\ManyToMany(targetEntity="Projet", mappedBy="categorie")
     */
    private $projet;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add projet
     *
     * @param \ISL\CrearchitexBundle\Entity\Projet $projet
     *
     * @return Categorie
     */
    public function addProjet(\ISL\CrearchitexBundle\Entity\Projet $projet)
    {
        $this->projet[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ISL\CrearchitexBundle\Entity\Projet $projet
     */
    public function removeProjet(\ISL\CrearchitexBundle\Entity\Projet $projet)
    {
        $this->projet->removeElement($projet);
    }

    /**
     * Get projet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
