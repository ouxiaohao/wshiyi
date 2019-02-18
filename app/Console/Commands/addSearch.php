<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class addSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $cur_time = time();
        $articles = Article::orderBy('id')
            ->select('id','title','keywords')
            ->get();
        $xs = new \XS('search');
        print_r($xs->search->search('mac'));die;
        $index = $xs->index;
        $doc = new \XSDocument;
        foreach ($articles as $article) {
//            添加文档
            $doc->setFields([
                'id'=>$article->id,
                'title'=>$article->title,
                'keywords'=>$article->keywords,
                'chrono'=>$cur_time,
            ]);
//            提交到索引中
            $index->add($doc);
        }

        return true;
    }
}
