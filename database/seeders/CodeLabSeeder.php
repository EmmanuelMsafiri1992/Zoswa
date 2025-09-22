<?php

namespace Database\Seeders;

use App\Models\CodeLab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $codeLabs = [
            [
                'title' => 'Introduction to JavaScript Functions',
                'description' => 'Learn the basics of creating and using functions in JavaScript.',
                'instructions' => 'Write a function called greetUser that takes a name parameter and returns a greeting message.',
                'course_id' => 1,
                'programming_language' => 'javascript',
                'starter_code' => [
                    'main' => '// Write your function here
function greetUser(name) {
    // Your code goes here
}

// Test your function
console.log(greetUser("John"));'
                ],
                'solution_code' => [
                    'main' => 'function greetUser(name) {
    return "Hello, " + name + "! Welcome to Zoswa!";
}

console.log(greetUser("John"));'
                ],
                'test_cases' => [
                    [
                        'description' => 'Function returns correct greeting',
                        'code' => 'console.log(greetUser("Alice"));',
                        'expected' => 'Hello, Alice! Welcome to Zoswa!'
                    ]
                ],
                'difficulty' => 'beginner',
                'estimated_time' => 30,
                'max_score' => 100,
                'is_published' => true,
                'order' => 1,
                'hints' => ['Remember to use the return statement', 'You can concatenate strings with the + operator'],
                'resources' => []
            ],
            [
                'title' => 'Python List Operations',
                'description' => 'Master basic list operations in Python including append, remove, and iteration.',
                'instructions' => 'Create a function that filters even numbers from a list and returns a new list.',
                'course_id' => 2,
                'programming_language' => 'python',
                'starter_code' => [
                    'main' => '# Write your function here
def filter_even_numbers(numbers):
    # Your code goes here
    pass

# Test your function
test_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
print(filter_even_numbers(test_list))'
                ],
                'solution_code' => [
                    'main' => 'def filter_even_numbers(numbers):
    return [num for num in numbers if num % 2 == 0]

test_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
print(filter_even_numbers(test_list))'
                ],
                'test_cases' => [
                    [
                        'description' => 'Function filters even numbers correctly',
                        'code' => 'print(filter_even_numbers([1, 2, 3, 4, 5]))',
                        'expected' => '[2, 4]'
                    ]
                ],
                'difficulty' => 'intermediate',
                'estimated_time' => 45,
                'max_score' => 100,
                'is_published' => true,
                'order' => 1,
                'hints' => ['Use list comprehension', 'The modulo operator % can help check for even numbers'],
                'resources' => []
            ],
            [
                'title' => 'PHP Array Manipulation',
                'description' => 'Learn to work with associative arrays in PHP and perform common operations.',
                'instructions' => 'Create a function that takes an array of user data and returns only active users.',
                'course_id' => 1,
                'programming_language' => 'php',
                'starter_code' => [
                    'main' => '<?php
// Write your function here
function getActiveUsers($users) {
    // Your code goes here
}

// Test data
$users = [
    ["name" => "John", "active" => true],
    ["name" => "Jane", "active" => false],
    ["name" => "Bob", "active" => true]
];

print_r(getActiveUsers($users));
?>'
                ],
                'solution_code' => [
                    'main' => '<?php
function getActiveUsers($users) {
    return array_filter($users, function($user) {
        return $user["active"] === true;
    });
}

$users = [
    ["name" => "John", "active" => true],
    ["name" => "Jane", "active" => false],
    ["name" => "Bob", "active" => true]
];

print_r(getActiveUsers($users));
?>'
                ],
                'test_cases' => [],
                'difficulty' => 'intermediate',
                'estimated_time' => 40,
                'max_score' => 100,
                'is_published' => true,
                'order' => 2,
                'hints' => ['Use array_filter() function', 'Check the "active" key in each user array'],
                'resources' => []
            ],
            [
                'title' => 'HTML Structure Basics',
                'description' => 'Learn to create proper HTML document structure with semantic elements.',
                'instructions' => 'Create a complete HTML page with header, main content, and footer sections.',
                'course_id' => 1,
                'programming_language' => 'html',
                'starter_code' => [
                    'main' => '<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags and title here -->
</head>
<body>
    <!-- Create your page structure here -->
</body>
</html>'
                ],
                'solution_code' => [
                    'main' => '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Webpage</title>
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Home Section</h2>
            <p>This is the main content area.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 My Website. All rights reserved.</p>
    </footer>
</body>
</html>'
                ],
                'test_cases' => [],
                'difficulty' => 'beginner',
                'estimated_time' => 25,
                'max_score' => 100,
                'is_published' => true,
                'order' => 1,
                'hints' => ['Use semantic HTML5 elements', 'Include proper meta tags in the head section'],
                'resources' => []
            ]
        ];

        foreach ($codeLabs as $codeLabData) {
            CodeLab::create($codeLabData);
        }
    }
}
