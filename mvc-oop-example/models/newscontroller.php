<?php
 
class NewsController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
     
    public function index()
    {
        try {
             
            $articles = $this->_model->getVisibleNews();
            $this->_view->set('articles', $articles);
            $this->_view->set('title', 'News articles from the database');
             
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function details($articleId)
    {
        try {
             
            $article = $this->_model->getArticleById((int)$articleId);
             
            if ($article)
            {
                $this->_view->set('title', $article['title']);
                $this->_view->set('articleBody', $article['article']);
                $this->_view->set('datePublished', $article['date']);
            }
            else
            {
                $this->_view->set('title', 'Invalid article ID');
                $this->_view->set('noArticle', true);
            }
             
            return $this->_view->output();
              
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    // End
}