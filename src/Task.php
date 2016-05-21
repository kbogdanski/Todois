<?php

class Task {
    private $taskName;
    private $content;
    private $status;
    private $prioryty = null;
    private $date = null;
    private $overdue;

    public function setTaskName($taskName) {
        $this->taskName = $taskName;
    }

    public function getTaskName() {
        return $this->taskName;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    public function getStatus() {
        return $this->status;
    }

    public function finishTask() {
        $this->status = true;
    }

    public function setPrioryty($prioryty) {
        $this->prioryty = $prioryty;
    }

    public function getPrioryty() {
        return $this->prioryty;
    }

    public function setDate($date) {
        $this->date = str_replace('T',' ',$date);
    }

    public function getDate() {
        return $this->date;
    }

    public function checkOverdue () {
        if ($this->getDate() != null) {
            $currentDate = strtotime('now');
            $deadline = strtotime($this->getDate());
            if ($currentDate > $deadline) {
                return $this->overdue = true;
            } else {
                return $this->overdue = false;
            }
        } else {
            return $this->overdue = false;
        }
    }

    public function __construct($taskName, $content, $prioryty = null, $date = null) {
        $this->setTaskName($taskName);
        $this->setContent($content);
        $this->status = false;
        $this->setPrioryty($prioryty);
        $this->setDate($date);
        $this->overdue = false;
    }

    public function displayTask () {
        echo $this->getTaskName().": ".$this->getContent();
    }

    public function displayTaskName () {
        if ($this->getStatus() == false) {
            if ($this->checkOverdue()) {
                return '<td class="text-uppercase text-danger"><strong>'.$this->getTaskName().':</strong></td>';
            } else {
                return '<td class="text-uppercase"><strong>'.$this->getTaskName().':</strong></td>';
            }
        } else {
            return '<td class="text-uppercase"><s><strong>'.$this->getTaskName().':</strong></s></td>';
        }
    }

    public function displayContent () {
        if ($this->getStatus() == false) {
            if ($this->checkOverdue()) {
                return '<td class="text-danger">'.$this->getContent().'</td>';
            } else {
                return '<td>'.$this->getContent().'</td>';
            }
        } else {
            return '<td><s>'.$this->getContent().'</s></td>';
        }
    }

    public function displayPrioryty () {
        if ($this->getPrioryty() != null) {
            return '<td><img src="img/'.$this->getPrioryty().'.png" title="'.$this->getPrioryty().'"></td>';
        } else {
            return '<td>BRAK</td>';
        }
    }

    public function displayDate () {
        if ($this->getDate() != null) {
            if ($this->checkOverdue() && $this->getStatus() == false) {
                return '<td class="text-danger">'.$this->getDate().'</td>';
            } else {
                return '<td>'.$this->getDate().'</td>';
            }
        } else {
            return '<td>Brak</td>';
        }
    }

}
?>