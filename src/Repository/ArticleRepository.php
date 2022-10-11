<?php

namespace App\Repository;


use App\Entity\Article;
use App\Mapper\ArticleMapper;

class ArticleRepository
{
    public ArticleMapper $articleMapper;
    public function __construct(ArticleMapper $articleMapper)
    {
        $this->articleMapper = $articleMapper;
    }

    public function save(Article $article)
    {
        return $this->articleMapper->insert($article);
    }

    public function update(Article $article)
    {
        return $this->articleMapper->update($article);
    }
    
    public function delete(Article $article)
    {
        return $this->articleMapper->delete($article);
    }

    public function find(int $id): ?Article
    {
        return $this->articleMapper->find($id);
    }

    public function findAll(): array
    {
        return $this->articleMapper->findAll();
    }
}
