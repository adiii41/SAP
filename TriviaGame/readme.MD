                            -----:Trivia_Game :----
							
For this assignment, I am going to allow you to work individually or in groups of two. If you choose to work as a group, you will submit only one file between you and share the same grade. Programming in pairs is actually a thing, it's called Pair Programming and has many benefits. Many employers recognize the benefits of this and allow their staff to take part in this practice. If you do work as a group, I would ask you take some time to review some of these pair programming rules This link is not working please find the How To Pair Program PDF below the requirements. I think it would be a neat thing for you to bring up, perhaps in an interview, that you have heard of the idea of Pair Programming, are aware of the benefits and pitfalls, and have even given it a try.

The Instructions

We have been looking at ways of "remembering" or storing values on the server for the user in-between page requests. This is called managing the state.

For this assignment, you will be demonstrating your abilities to do this. 

You need to make an online trivia game. Remembering the state is key to making this work.

trivia.php

trivia.php will display a trivia question (from a text file) and provide a form with a textbox for the user to type their guess. The form will submit back to itself (trivia.php).

You will load your trivia questions from the provided triviaQuestions.zip file. Please note that there is one question and answer per line. These are separated by a \t character. Your program needs to allow for any number of questions in trivQuestions.txt.

You must use the session to manage the game progress data. 

You will start by displaying the first question to the user, and after they give a non-empty response, move on to the second question, and so-forth. Provide a progress indicator to the user. For example: Question 6 of 8.

When the user has completed all the questions, display a table for the results. 

Each row of the output table will contain the question number, the question text, the correct answer, and the answer the user typed. If the user got it correct, change the background-color of the row to light green, else change the background color to light red. Display the percentage of answers that they got correct.

At any time the user can restart the game by clicking a hyperlink labeled Restart. This will bring them back to the first question, and 0 their score.

Have fun and remember to do your own work!

Submit: trivia.php in a .zip file

Marking Breakdown:
Marks available for trivia.php page:

/3 clean code
/2 meaningful comments header and inline
/5 bootstrap employed for styling page, form, and result table

/10 successfully load questions from txt file and allow for any number of questions 

/5 data validation on responses (non empty responses) - the user SHOULD be able to type their answer in upper or lowercase

/16 html table showing question text, question number, correct answer and the answer the user entered
/5 proper row background colors
/4 display correct answer percentage

/5 hyperlink to restart game

Total /55