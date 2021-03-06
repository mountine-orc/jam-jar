<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="type")
     */
    private $jamJar;

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
     * Set name
     *
     * @param string $name
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jamJar = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add jamJar
     *
     * @param JamJar $jamJar
     * @return Type
     */
    public function addJamJar(JamJar $jamJar)
    {
        $this->jamJar[] = $jamJar;

        return $this;
    }

    /**
     * Remove jamJar
     *
     * @param JamJar $jamJar
     */
    public function removeJamJar(JamJar $jamJar)
    {
        $this->jamJar->removeElement($jamJar);
    }

    /**
     * Get jamJar
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJamJar()
    {
        return $this->jamJar;
    }
}
