<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\Idea;

class IdeaObserver
{
    /**
     * Handle the Idea "created" event.
     */
    public function created(Idea $id): void
    {
        $comments = [
            "Did you come up with this all by yourself? Impressive. Not.",
            "I've seen better ideas on the back of cereal boxes.",
            "If this is the best you've got, maybe stick to your day job.",
            "Congratulations, you've officially wasted my time.",
            "I didn't know it was possible to put so little thought into something.",
            "Are you sure this isn't just a typo? Because it reads like nonsense.",
            "This is the kind of idea that makes me lose faith in humanity.",
            "Is this a joke? Please tell me it's a joke.",
            "I've seen Mario come up with better ideas than this and he is stupid.",
            "This is so bad, it's almost impressive.",
            "Next time you have an idea, keep it to yourself.",
            "This made my brain hurt. Thanks.",
            "If bad ideas were a competition, you'd win first prize.",
            "I've seen better ideas in my spam folder.",
            "This is why we can't have nice things.",
            "Did you even think before typing this?",
            "My dog has better ideas, and he eats socks.",
            "You must be really proud of this... or not.",
            "This idea belongs in the trash. No offense.",
            "I'm cringing so hard, my face might get stuck.",
            "I've seen more coherent thoughts from a toddler.",
            "Bravo, you've managed to lower the bar even further.",
            "Just when I thought ideas couldn't get any worse, here we are."
        ];

        // Select a random comment
        $randomComment = $comments[array_rand($comments)];

        Comment::create([
            'user_id' => 9,
            'idea_id' => $id->id,
            'content' => $randomComment,
        ]);
    }
}
