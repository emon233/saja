<?php

return [
    'roles' => [
        'editor' => 'Editor',
        'reviewer' => 'Reviewer',
        'author' => 'Author'
    ],

    'forwards' => [
        'forwarded' => 'FORWARDED',
        'accepted' => 'ACCEPTED',
        'rejected' => 'REJECTED',
        'reviewed' => 'REVIEWED'
    ],

    'status' => [
        'new' => 'NEW',
        'reviewing' => 'REVIEWING',
        'reviewed' => 'REVIEWED',
        'revisioning' => 'REVISIONING',
        'revisioned' => 'REVISIONED',
        'processing' => 'PROCESSING',
        'published' => 'PUBLISHED'
    ],

    'titles' => [
        'editor_all' => 'ALL PAPERS',
        'editor_new' => 'NEW SUBMITTED PAPERS',
        'editor_reviewing' => 'PAPERS UNDER REVIEWING',

        'author_all' => 'ALL SUBMITTED PAPERS',
        'author_new' => 'NEW SUBMITTED PAPERS',

        'reviewer_new' => 'NEW FORWARDED PAPERS',
    ],
];
