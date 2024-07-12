@extends('layouts.layout')

@section('content')
    <?php 
        if(DB::connection()->getPdo()){
            echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
        }
    ?>
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <p>Congratulations on joining the wildest corner of the internet. By using Unfiltered, 
                you're agreeing to these terms. If you don't agree, then... well, why are you even here?</p>

            <h3>1. Content</h3>
                <p>Post dumb memes and random ideas. Seriously, we love that stuff.
                No serious business allowed. This isn't LinkedIn.
                No hate speech, bullying, or anything illegal.(optional)</p>
            <h3>2. Privacy</h3>
                <p>We respect your privacy, but remember: anything you post is out there forever. Think before you post that 3 AM thought.
                We won’t sell your data, but we might laugh at your posts.</p>
            <h3>3. Conduct</h3>
                <p>Don't be a jerk. Be nice to others. This is a place for dumb fun, not dumb fights.
                Trolls will be fed to the meme sharks.</p>
            <h3>4. Liability</h3>
                <p>We’re not responsible for any loss of sanity from excessive meme exposure.
                Use Unfiltered at your own risk. Side effects may include uncontrollable laughter and loss of productivity.</p>
            <h3>5. Account Termination</h3>
                <p>We reserve the right to ban anyone who takes things too seriously or ruins the fun for others.
                If you get banned, try knitting or something.</p>
            <h3>6. Updates to Terms</h3>
                <p>We might change these terms whenever we feel like it. Check back every now and then.</p>
            <h3>7. Legal Stuff</h3>
                <p>By using Unfiltered, you agree that you’re okay with all the nonsense above. If not, there are plenty of serious websites out there.
                Enjoy Unfiltered and happy meme-ing!</p>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection