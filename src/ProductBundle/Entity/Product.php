<?php
 
namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ProductBundle\Entity\ImageProduct;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sizeInch", type="string", nullable=true)
     */
    private $sizeInch;

    /**
     * @var string
     *
     * @ORM\Column(name="sizeCm", type="string", nullable=true)
     */
    private $sizeCm;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="composition", type="text", nullable=true)
     */
    private $composition;

    /**
     * @var string
     *
     * @ORM\Column(name="form", type="text", nullable=true)
     */
    private $form;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=0,nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="unitPrice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $unitPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="wholesalePrice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $wholesalePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="specialPrice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $specialPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="internetPrice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $internetPrice;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * Many prod can have Many cat.
     * @ORM\ManyToMany(targetEntity="CategoryBundle\Entity\Category", inversedBy="Product")
     * @ORM\JoinTable(name="category_product")
     */
    private $categories;

    /**
     * Many prod can have Many pack.
     * @ORM\ManyToMany(targetEntity="PackageBundle\Entity\Package", inversedBy="Product")
     * @ORM\JoinTable(name="package_product")
     */
    private $packages;

    /**
     * Many prod can have Many pack.
     * @ORM\ManyToMany(targetEntity="ProviderBundle\Entity\Provider", inversedBy="Product")
     * @ORM\JoinTable(name="provider_product")
     */
    private $providers;

    /**
     * @var File
     *
     * @ORM\OneToMany(targetEntity="ImageProduct", mappedBy="product", cascade={"persist","remove"})
     *
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="ProductLog", mappedBy="product")
     */
    private $product_log;




    public function __construct() {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->packages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->providers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        
    }


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
     * @return Product
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * Set sizeInch
     *
     * @param string $sizeInch
     *
     * @return Product
     */
    public function setSizeInch($sizeInch)
    {
        $this->sizeInch = $sizeInch;

        return $this;
    }

    /**
     * Get sizeInch
     *
     * @return string
     */
    public function getSizeInch()
    {
        return $this->sizeInch;
    }

    /**
     * Set sizeCm
     *
     * @param string $sizeCm
     *
     * @return Product
     */
    public function setSizeCm($sizeCm)
    {
        $this->sizeCm = $sizeCm;

        return $this;
    }

    /**
     * Get sizeCm
     *
     * @return string
     */
    public function getSizeCm()
    {
        return $this->sizeCm;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Product
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set composition
     *
     * @param string $composition
     *
     * @return Product
     */
    public function setComposition($composition)
    {
        $this->composition = $composition;

        return $this;
    }

    /**
     * Get composition
     *
     * @return string
     */
    public function getComposition()
    {
        return $this->composition;
    }

    /**
     * Set form
     *
     * @param string $form
     *
     * @return Product
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set unitPrice
     *
     * @param string $unitPrice
     *
     * @return Product
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set wholesalePrice
     *
     * @param string $wholesalePrice
     *
     * @return Product
     */
    public function setWholesalePrice($wholesalePrice)
    {
        $this->wholesalePrice = $wholesalePrice;

        return $this;
    }

    /**
     * Get wholesalePrice
     *
     * @return string
     */
    public function getWholesalePrice()
    {
        return $this->wholesalePrice;
    }

    /**
     * Set specialPrice
     *
     * @param string $specialPrice
     *
     * @return Product
     */
    public function setSpecialPrice($specialPrice)
    {
        $this->specialPrice = $specialPrice;

        return $this;
    }

    /**
     * Get specialPrice
     *
     * @return string
     */
    public function getSpecialPrice()
    {
        return $this->specialPrice;
    }

    /**
     * Set internetPrice
     *
     * @param string $internetPrice
     *
     * @return Product
     */
    public function setInternetPrice($internetPrice)
    {
        $this->internetPrice = $internetPrice;

        return $this;
    }

    /**
     * Get internetPrice
     *
     * @return string
     */
    public function getInternetPrice()
    {
        return $this->internetPrice;
    }

    

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Product
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }





    /**
     * Add categories
     *
     * @param \CategoryBundle\Entity\Category $categories
     *
     * @return Product
     */
    public function addCategories(\CategoryBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \CategoryBundle\Entity\Category $categories
     */
    public function removeCategories(\CategoryBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setCategories($categories)
    {
        return $this->categories=$categories;
    }

    /**
     * Add packages
     *
     * @param \PackageBundle\Entity\Package $packages
     *
     * @return Product
     */
    public function addPackages(\PackageBundle\Entity\Package $packages)
    {
        $this->packages[] = $packages;

        return $this;
    }

    /**
     * Remove packages
     *
     * @param \PackageBundle\Entity\Package $packages
     */
    public function removePackages(\PackageBundle\Entity\Package $packages)
    {
        $this->packages->removeElement($packages);
    }

    /**
     * Get packages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set packages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setPackages($packages)
    {
        return $this->packages=$packages;
    }


    /**
     * Add providers
     *
     * @param \ProviderBundle\Entity\Provider $provider
     *
     * @return Product
     */
    public function addProviders(\ProviderBundle\Entity\Provider $providers)
    {
        $this->providers[] = $providers;

        return $this;
    }

    /**
     * Remove providers
     *
     * @param \ProviderBundle\Entity\Provider $provider
     */
    public function removeProviders(\ProviderBundle\Entity\Provider $providers)
    {
        $this->providers->removeElement($providers);
    }

    /**
     * Get providers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * Set providers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setProviders($providers)
    {
        return $this->providers=$providers;
    }



    /**
     * Add image
     *
     * @param \ProductBundle\Entity\ImageProduct $image
     *
     * @return Product
     */
    public function addImages($image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \ProductBundle\Entity\ImageProduct $image
     */
    public function removeImages($image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setImages($images)
    {
        return $this->images=$images;
    }


    /**
     * Get productLog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductLog()
    {
        return $this->product_log;
    }

    /**
     * Set productLog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setProductLog($product_log)
    {
        return $this->product_log=$product_log;
    }


    
}
