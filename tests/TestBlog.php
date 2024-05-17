<?php declare(strict_types=1);
namespace Project;

use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Project\Models\Blog;
use Project\Models\BlogManager;

include 'src/config/config.php';

final class TestBlog extends TestCase
{
    protected $tm;

    public function setUp(): void
    {
        $this->tm = new BlogManager();
    }
    public function testGetBlogById()
    {
        $this->assertInstanceOf(
            Blog::class,
            $this->tm->getBlogWithId(7)
        );
    }
    public function testGetBlog()
    {
        $this->assertEmpty(
            $this->tm->delete(7),
        );
    }
}
