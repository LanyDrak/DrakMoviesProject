<?php

namespace homeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * NewInfo
 *
 * @ORM\Table(name="new")
 * @ORM\Entity(repositoryClass="homeBundle\Repository\NewRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class NewInfo
{

    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $news_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="news_creationTimestamp", type="datetime")
     */
    private $news_creationTimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="news_title", type="string", length=255)
     */
    private $news_title;

    /**
     * @var string
     *
     * @ORM\Column(name="news_intro", type="text")
     */
    private $news_intro;

    /**
     * @var string
     *
     * @ORM\Column(name="news_featuredImage", type="string", length=255, nullable=true)
     */
    private $news_featuredImage;

    /**
     * @var string
     *
     * @ORM\Column(name="news_author", type="string", length=50)
     */
    private $news_author;

    /**
     * @var string
     *
     * @ORM\Column(name="news_content", type="text")
     */
    private $news_content;


    /**
     * Get newsId
     *
     * @return integer
     */
    public function getNewsId()
    {
        return $this->news_id;
    }

    /**
     * Set newsCreationTimestamp
     *
     * @param \DateTime $newsCreationTimestamp
     *
     * @return NewInfo
     */
    public function setNewsCreationTimestamp($newsCreationTimestamp)
    {
        $this->news_creationTimestamp = $newsCreationTimestamp;

        return $this;
    }

    /**
     * Get newsCreationTimestamp
     *
     * @return \DateTime
     */
    public function getNewsCreationTimestamp()
    {
        return $this->news_creationTimestamp;
    }

    /**
     * Set newsTitle
     *
     * @param string $newsTitle
     *
     * @return NewInfo
     */
    public function setNewsTitle($newsTitle)
    {
        $this->news_title = $newsTitle;

        return $this;
    }

    /**
     * Get newsTitle
     *
     * @return string
     */
    public function getNewsTitle()
    {
        return $this->news_title;
    }

    /**
     * Set newsIntro
     *
     * @param string $newsIntro
     *
     * @return NewInfo
     */
    public function setNewsIntro($newsIntro)
    {
        $this->news_intro = $newsIntro;

        return $this;
    }

    /**
     * Get newsIntro
     *
     * @return string
     */
    public function getNewsIntro()
    {
        return $this->news_intro;
    }

    public function newsWebPath()
    {
        $output = "dist/img/uploads/newsImages/news_null.jpg";

        if ($this->news_featuredImage != null){
            $output = "dist/img/uploads/newsImages/".$this->news_featuredImage.".jpg";
        }

        return $output;
    }

    /**
     * Set newsFeaturedImage
     *
     * @param string $newsFeaturedImage
     *
     * @return NewInfo
     */
    public function setNewsFeaturedImage($newsFeaturedImage)
    {
        $this->news_featuredImage = $newsFeaturedImage;

        return $this;
    }

    /**
     * Get newsFeaturedImage
     *
     * @return string
     */
    public function getNewsFeaturedImage()
    {
        return $this->news_featuredImage;
    }

    /**
     * Set newsAuthor
     *
     * @param string $newsAuthor
     *
     * @return NewInfo
     */
    public function setNewsAuthor($newsAuthor)
    {
        $this->news_author = $newsAuthor;

        return $this;
    }

    /**
     * Get newsAuthor
     *
     * @return string
     */
    public function getNewsAuthor()
    {
        return $this->news_author;
    }

    /**
     * Set newsContent
     *
     * @param string $newsContent
     *
     * @return NewInfo
     */
    public function setNewsContent($newsContent)
    {
        $this->news_content = $newsContent;

        return $this;
    }

    /**
     * Get newsContent
     *
     * @return string
     */
    public function getNewsContent()
    {
        return $this->news_content;
    }
}
