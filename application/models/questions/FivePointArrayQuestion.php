<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 8/20/15
 * Time: 11:56 AM
 */

namespace ls\models\questions;


class FivePointArrayQuestion extends FixedArrayQuestion
{

    protected function createAnswers($count = 5) {
        $answers = [];
        for ($i = 1; $i <= $count; $i++) {
            $answers[] = $answer = new \QuestionAnswer($i, $i);
        }
        if (!$this->bool_mandatory && $this->survey->bool_shownoanswer) {
            $answers[] = new \QuestionAnswer("", gT("No answer"));
        }
        return $answers;
    }
    /**
     * @param null $scale
     * @return \QuestionAnswer[]
     */
    public function getAnswers($scale = null)
    {
        return $this->createAnswers();
    }

    /**
     * This function return the class by question type
     * @param string question type
     * @return string Question class to be added to the container
     */
    public function getClasses()
    {
        $result = parent::getClasses();
        $result[] = 'array-5-pt';
        return $result;
    }


    protected function getSummary()
    {
        return gT("An array with sub-question on each line. The answers are value from 1 to 5 and are contained in the table header. ");
    }
}