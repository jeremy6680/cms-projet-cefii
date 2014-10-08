<article class="post">
    <header class="post-header">
        <h1 class="post-title">
            {{$post->title}}
        </h1>
        <div class="clearfix">
            <span class="left date">{{ $post->created_at->format('d/m/Y') }}</span>
            <span class="right label">{{HTML::link('#reply','Répondre',['style'=>'color:inherit'])}} </span>
        </div>
    </header>
    <div class="post-content">
        <p>{{ Markdown::parse($post->content) }}</p>
    </div>
    <footer class="post-footer">
        <hr>
    </footer>
</article>
<section class="comments">
    @if(!$comments->isEmpty())
        <h3>Commentaires sur {{$post->title}}</h3>
        <ul>
            @foreach($comments as $comment)
                <li>
                    <article>
                        <header>
                            <div class="clearfix">
                                <span class="right date">{{ $comment->created_at->format('d/m/Y') }}</span>
                                <span class="left commenter">{{link_to_route('posts.show',$comment->commenter,$post->id)}}</span>
                            </div>
                        </header>
                        <div class="comment-content">
                            <p>{{{$comment->comment}}}</p>
                        </div>
                        <footer>
                            <hr>
                        </footer>
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <h3>Aucune commentaire sur {{$post->title}}</h3>
    @endif
    <!--comment form -->
    @include('comments.commentform') 
</section>