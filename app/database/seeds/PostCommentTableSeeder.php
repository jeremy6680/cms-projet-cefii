<?php
     
    class PostCommentTableSeeder extends Seeder {
    	
	    private function randDate()
		{
			return date("Y-m-d H:i:s", mt_rand(strtotime('Jan 01 2010'),strtotime('Sep 24 2014')));
		}
     
	    public function run()
	    {
		    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
		    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
		    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
		    mauris justo volutpat elit,
		    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
		    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.';
		    for( $i = 1 ; $i <= 20 ; $i++ )
	    	{
	    		$date = $this->randDate();
			    $post = new Post;
			    $post->title = "Post no $i";
				$post->slug = Str::slug("Post no $i");
				$post->draft = rand(0, 1);
			    $post->content = $content;
				$post->created_at = $date;
          		$post->updated_at = $date;
				$post->user_id = rand(1, 10);
			    $post->save();
			     
			    $maxComments = mt_rand(3,15);
			    for( $j = 1 ; $j <= $maxComments; $j++)
			    {
				    $comment = new Comment;
				    $comment->commenter = 'xyz';
				    $comment->comment = substr($content, 0, 120);
				    $comment->email = 'xyz@xmail.com';
				    $comment->approved = 1;
				    $post->comments()->save($comment);
				    $post->increment('comment_count');
			    }
    		}
    	}
    }