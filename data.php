<?php
// --- Mock Data for CareerFlow ---

$jobs = [
    ['id' => 1, 'title' => 'Frontend Developer', 'company' => 'Google', 'location' => 'Remote', 'type' => 'full-time', 'salary' => '$120k - $180k', 'logo' => 'G'],
    ['id' => 2, 'title' => 'Software Engineering Intern', 'company' => 'Microsoft', 'location' => 'Redmond, WA', 'type' => 'internship', 'salary' => '$8k/mo', 'logo' => 'M'],
    ['id' => 3, 'title' => 'Backend Engineer (Go)', 'company' => 'Netflix', 'location' => 'Los Gatos, CA', 'type' => 'full-time', 'salary' => '$200k+', 'logo' => 'N'],
    ['id' => 4, 'title' => 'Full Stack Developer', 'company' => 'Stripe', 'location' => 'San Francisco, CA', 'type' => 'full-time', 'salary' => '$150k - $210k', 'logo' => 'S'],
    ['id' => 5, 'title' => 'Product Design Intern', 'company' => 'Apple', 'location' => 'Cupertino, CA', 'type' => 'internship', 'salary' => '$7k/mo', 'logo' => 'A']
];

$companies = [
    ['name' => 'Google', 'process' => '5 Rounds (Phone + 4 Onsite)', 'focus' => 'DSA + System Design', 'eligibility' => 'CGPA > 7.5', 'tag' => 'Big Tech'],
    ['name' => 'Amazon', 'process' => '3 Rounds (OA + 2 Technical)', 'focus' => 'Leadership Principles', 'eligibility' => 'No Active Backlogs', 'tag' => 'Product Based'],
    ['name' => 'Meta', 'process' => '4 Rounds (Technical + Behavioral)', 'focus' => 'Product Thinking', 'eligibility' => 'Open to All Majors', 'tag' => 'Big Tech'],
    ['name' => 'TCS', 'process' => '2 Rounds (Aptitude + Technical)', 'focus' => 'Core Fundamentals', 'eligibility' => 'CGPA > 6.0', 'tag' => 'Service Based'],
    ['name' => 'Goldman Sachs', 'process' => '4 Rounds (Quant + Coding)', 'focus' => 'Mathematics + DSA', 'eligibility' => 'CGPA > 8.0', 'tag' => 'FinTech']
];

$dsaTopics = [
    'arrays' => [
        ['id' => 101, 'title' => 'Two Sum', 'difficulty' => 'easy', 'link' => '#'],
        ['id' => 102, 'title' => 'Contains Duplicate', 'difficulty' => 'easy', 'link' => '#'],
        ['id' => 103, 'title' => 'Valid Anagram', 'difficulty' => 'easy', 'link' => '#'],
        ['id' => 104, 'title' => 'Group Anagrams', 'difficulty' => 'medium', 'link' => '#'],
        ['id' => 105, 'title' => 'Top K Frequent Elements', 'difficulty' => 'medium', 'link' => '#']
    ],
    'linked-lists' => [
        ['id' => 201, 'title' => 'Reverse Linked List', 'difficulty' => 'easy', 'link' => '#'],
        ['id' => 202, 'title' => 'Merge Two Sorted Lists', 'difficulty' => 'easy', 'link' => '#'],
        ['id' => 203, 'title' => 'Reorder List', 'difficulty' => 'medium', 'link' => '#']
    ]
];
?>
