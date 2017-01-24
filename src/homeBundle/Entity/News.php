<?php

namespace homeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="homeBundle\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class News
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
     * @ORM\Column(name="nom", type="string", length=50)
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
     * @return News
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
     * @return News
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
     * @return News
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

    /**
     * Set newsFeaturedImage
     *
     * @param string $newsFeaturedImage
     *
     * @return News
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
     * @return News
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
     * @return News
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
