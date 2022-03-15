@extends('common.article')

@section('title', 'Welkom op mijn Portfolio')

@section('background', Illuminate\Support\Facades\Storage::url('img/HBO-ICT-Software-Engineer-1920x600.jpg'))

@section('section')
<div class="column is-8-desktop is-12-tablet">
    <div class="content">
        <p>
            Posuere porttitor natoque velit duis penatibus fermentum dignissim ut? Vel vel mi purus
            tempor nec conubia platea venenatis. Mauris pharetra auctor magnis, vehicula integer risus
            taciti gravida semper fames! Eu fermentum lorem accumsan litora. Consequat dapibus interdum
            primis lorem. Convallis integer mi suscipit tempor. Ad tincidunt placerat at. Sagittis
            pulvinar consectetur commodo, placerat varius sociosqu egestas felis! Curae; dictumst porta
            tempus. Nisi nec morbi netus euismod egestas proin sed tempor. Nam feugiat ante ante.
            Conubia vehicula tincidunt facilisis quisque risus senectus convallis. Eget at feugiat vel
            nisi. Tortor, facilisis neque elementum ultricies blandit amet orci dictumst eu mi molestie.
            Libero vulputate porta proin volutpat suspendisse aenean aenean facilisi ut primis!
            Venenatis elementum auctor neque urna et facilisis vulputate erat lorem habitasse libero!
            Risus ornare quam rutrum praesent blandit congue aliquet mauris.
        </p>
        <p>
            Elementum orci eget vel adipiscing tempor malesuada? Sollicitudin euismod nunc feugiat
            accumsan accumsan condimentum nulla pellentesque sagittis habitasse suspendisse praesent?
            Lectus proin justo vulputate tristique duis metus, est pellentesque blandit quam pharetra.
            Maecenas tincidunt litora mauris mollis ornare dictum nec placerat lectus massa lobortis
            auctor. Hac feugiat dolor, ac ridiculus mi adipiscing aptent elementum suspendisse augue
            rutrum! Habitasse a consequat ornare dictumst integer dis porta.
        </p>
        <p>
            Blandit mollis felis gravida sem ad venenatis ut a lacus! Magna odio netus, torquent rhoncus
            fames velit. Adipiscing libero, class cursus ipsum penatibus enim mollis netus. Sociis
            luctus eros sapien platea parturient fringilla. Senectus purus tincidunt laoreet purus
            praesent. Accumsan pulvinar tincidunt gravida malesuada senectus proin, elit cubilia
            lobortis quisque tellus? Torquent dis natoque sapien natoque sagittis conubia pulvinar risus
            elementum hac adipiscing arcu. Sem nisl fusce phasellus adipiscing pretium eget hendrerit
            proin non. Vestibulum lacus magna, commodo volutpat.
        </p>
        <p>
            Vivamus ridiculus amet arcu. Magnis venenatis vehicula venenatis molestie molestie proin sed
            blandit, inceptos volutpat. Auctor auctor massa sodales ipsum. Congue est quisque porta?
            Porta phasellus sem torquent ad feugiat sollicitudin nisi tempor tortor habitasse. Eros
            condimentum enim blandit pulvinar. Justo aenean, taciti curae; diam volutpat cubilia ante
            vestibulum. Augue penatibus phasellus inceptos tortor convallis ridiculus at ad. Nisl
            curabitur vel gravida, montes sit velit pellentesque. Sem, dapibus maecenas urna lectus
            mauris quisque nibh accumsan amet curabitur egestas dolor. Sagittis montes magnis quam
            fringilla accumsan bibendum. Nisl, a laoreet himenaeos sapien lorem quisque taciti lacus
            elit mauris. Mollis eleifend montes commodo? Accumsan nullam venenatis malesuada netus metus
            sociosqu magnis velit. Rhoncus lacus tempus praesent fermentum netus ullamcorper dolor
            integer nulla.
        </p>
        <p>
            Habitasse suspendisse egestas vestibulum pellentesque per leo enim metus donec ad. Hac metus
            convallis nibh eget, parturient dis elementum posuere. Felis, ultricies fusce est cubilia
            facilisis odio id velit dapibus suspendisse. Erat praesent nullam aliquam. Rutrum commodo
            eget malesuada per montes, curae; senectus convallis sociis per. Risus mattis justo vivamus
            lorem bibendum aenean eleifend facilisi, suscipit consectetur libero litora. Interdum?
        </p>
    </div>
</div>

<div class="column is-4-desktop is-12-tablet">
    <p class="title is-4">Laatste nieuws</p>

    <div class="columns is-multiline">

        @foreach($latestPosts as $post)
            <div class="column is-12">
                <div class="card">

                    <div class="card-image">
                        <img src="{{$post->img_url}}" alt="Post picture">
                    </div>

                    <div class="card-content">
                        <div class="content">

                            <a class="title is-4" href="/posts/{{$post->id}}">{{$post->title}}</a>

                            <p>{{$post->excerpt}}</p>
                        </div>
                        <div class="has-text-centered">
                            <a href="/posts/{{$post->id}}" class="button is-primary">Lees meer...</a>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">Gepubliceerd: {{ $post->published_at }}</p>
                    </footer>
                </div>
            </div>
        @endforeach

    </div>

</div>
@endsection
