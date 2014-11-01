{{ Form::open(['url' => 'search','method'=>'get']) }}
    <div class="row">
    <div class="small-8 large-8 column">
    {{ Form::text('s',Input::old('username'),['placeholder'=>'Search blog...']) }}
    </div>
    {{ Form::submit('Search',['class'=>'button tiny radius']) }}
    </div>
    {{ Form::close() }}
    <div>
    <h3>Recent Posts</h3>
    <ul>
    <!--<?php $recentPosts = Post::orderBy('id','desc')->take(5)->get(); ?>-->
    @foreach($recentPosts as $post)
    <li>{{link_to_route('posts.show',$post->title,$post->id)}}</li>
    @endforeach
    </ul>
    </div>