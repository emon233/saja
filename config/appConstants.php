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
        'accepted' => 'ACCEPTED',
        'rejected' => 'REJECTED',
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
        'author_reviewing' => 'PAPERS UNDER REVIEWING',
        'author_reviewed' => 'REVIEWED PAPERS',
        'author_revisioned' => 'REVISIONED PAPERS',
        'author_processing' => 'PAPERS UNDER PROCESSING',
        'author_published' => 'PUBLISHED PAPERS',
        'author_rejected' => 'REJECTED PAPERS',
        'author_accepted' => 'ACCEPTED PAPERS',

        'reviewer_new' => 'NEW FORWARDED PAPERS',
        'reviewer_accepted' => 'ALL ACCEPTED PAPERS',
        'reviewer_rejected' => 'ALL REJECTED PAPERS',
        'reviewer_reviewed' => 'ALL REVIEWED PAPERS',
        'reviewer_all' => 'ALL FORWARDED PAPERS',

        'editor_users' => 'USERS',
        'editor_reviewers' => 'REVIEWERS',
        'editor_editors' => 'EDITORS',
        'editor_reviewer_requests' => 'REQUESTED REVIEWERS'
    ],

    'types' => [
        'manuscript' => 'Manuscript',
        'title_page' => 'Title_Page',
        'cover_letter' => 'Cover_Letter',
        'check_list' => 'Check_List',
        'processing_fee' => 'Processing_Fee',
        'declaration_letter' => 'Declaration_Letter',
        'correction' => 'Correction',
        'payment_slip' => 'Payment_Slip',
        'edited_manuscript' => 'Edited_Manuscript',
        'galley_proof' => 'Galley_Proof',
        'final_galley_proof' => 'Final_Galley_Proof',
        'reviewed_manuscript' => 'Reviewed_Manuscript',
        'opinion_format' => 'Opinion_Format'
    ],
];
