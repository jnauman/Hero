<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Quest;
use App\Models\Category;
use App\Models\Campaign;

class QuestForm extends Component
{
    public $quest; // Add this property
    public $categories; // Add this property
    public $campaigns; // Add this property

    public $submitButtonText;

    public function __construct($quest = null)
    {
        $this->quest = $quest;
        $this->categories = Category::all();
        $this->campaigns = Campaign::all();

        $this->submitButtonText = $quest ? 'Update Quest' : 'Create Quest';

    }

    public function render()
    {
        return view('components.quest-form');
    }


}