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
        'editor_reviewing' => 'PAPERS UNDER REVIEW',
        'editor_reviewed' => 'REVIEWED PAPERS',
        'editor_revisioning' => 'PAPERS UNDER REVISION',
        'editor_revisioned' => 'REVISIONED PAPERS',
        'editor_processing' => 'PAPERS UNDER PROCESSING',
        'editor_published' => 'PUBLISHED PAPERS',

        'author_all' => 'ALL SUBMITTED PAPERS',
        'author_new' => 'NEW SUBMITTED PAPERS',

        'reviewer_new' => 'NEW FORWARDED PAPERS',
        'reviewer_accepted' => 'ALL ACCEPTED PAPERS',
        'reviewer_rejected' => 'ALL REJECTED PAPERS',
        'reviewer_reviewed' => 'ALL REVIEWED PAPERS',
        'reviewer_all' => 'ALL FORWARDED PAPERS'
    ],
];
