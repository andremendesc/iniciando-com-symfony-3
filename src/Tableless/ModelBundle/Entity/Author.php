<?php

namespace Tableless\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="Tableless\ModelBundle\Repository\AuthorRepository")
 */
class Author extends Timestampable
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
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\NotBlank
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
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
     * @var ArrayCollection 
     * 
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author", cascade={"remove"}) 
     */ 
    private $post;

    /** 
     * Constructor 
     */ 
    public function __construct() 
    { 
         parent::__construct();
    
        $this->post = new ArrayCollection(); 
    }

    /**
     * Add post
     *
     * @param \Tableless\ModelBundle\Entity\Post $post
     *
     * @return Author
     */
    public function addPost(\Tableless\ModelBundle\Entity\Post $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \Tableless\ModelBundle\Entity\Post $post
     */
    public function removePost(\Tableless\ModelBundle\Entity\Post $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPost()
    {
        return $this->post;
    }

    /*
     * Get instance name
     * @return string 
     */
    public function __toString()
    {
        return $this->getName(); 
    }
}
