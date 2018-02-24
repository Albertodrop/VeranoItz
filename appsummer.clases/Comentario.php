<?php 
	/**
	* 
	*/
	class Comentario 
	{
		private $comments_id;
		private $comments_nameusuario;	
		private $comments_message;
		private $comments_date;
		private $comments_summer_id_summerscourses;
		function __construct()
		{
			# code...
		}
		

	
    /**
     * @return mixed
     */
    public function getCommentsId()
    {
        return $this->comments_id;
    }

    /**
     * @param mixed $comments_id
     *
     * @return self
     */
    public function setCommentsId($comments_id)
    {
        $this->comments_id = $comments_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentsMessage()
    {
        return $this->comments_message;
    }

    /**
     * @param mixed $comments_message
     *
     * @return self
     */
    public function setCommentsMessage($comments_message)
    {
        $this->comments_message = $comments_message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentsDate()
    {
        return $this->comments_date;
    }

    /**
     * @param mixed $comments_date
     *
     * @return self
     */
    public function setCommentsDate($comments_date)
    {
        $this->comments_date = $comments_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentsSummerIdSummerscourses()
    {
        return $this->comments_summer_id_summerscourses;
    }

    /**
     * @param mixed $comments_summer_id_summerscourses
     *
     * @return self
     */
    public function setCommentsSummerIdSummerscourses($comments_summer_id_summerscourses)
    {
        $this->comments_summer_id_summerscourses = $comments_summer_id_summerscourses;

        return $this;
    }
}


 ?>