<?php

class Main
{
    private $max = 100005; //最大値が100000データなので、5つだけゆとりを持たせた最大値
    private $array = [];
    private $line;
    private $head = 0;
    private $tail = 0;
    private $past = 0;

    /**
     * データの初期化
     */
    public function __construct()
    {
        $fh = fopen('sample.txt', "r");

        $this->line = explode(' ', trim(fgets($fh)));
        foreach (range(1, $this->line[0]) as $_) {
            $item = explode(' ', trim(fgets($fh)));
            $inner = [
                'name' => $item[0],
                'time' => $item[1],
            ];
            $this->enqueue($inner);
        }
    }

    public function execute()
    {
        while ($this->head !== $this->tail) {
            # queueを取り出す
            $queue = $this->dequeue();
            # 処理時間を引く
            $queue['time'] -= $this->line[1];
            if ($queue['time'] > 0) {
                # 0より上のケースはまだ処理が完了していないとき。
                # 経過時間を保存
                $this->past += $this->line[1];

                # 処理が完了していないので後ろに追加する。
                $this->enqueue($queue);
            } else { // 
                # 経過時間を保存
                $this->past += $this->line[1] + $queue['time'];
                $queue['past'] = $this->past;
                echo $queue['name'] . " " . $queue['past'] . "\n";
            }
        }
    }

    /**
     * queueを配列から取り出す
     *
     * @return void
     */
    private function dequeue(): array
    {
        $queue = $this->array[$this->head];
        $this->array[$this->head] = null;
        if ($this->head + 1 === $this->max) {
            $this->head = 0;
        } else {
            $this->head++;
        }
        return $queue;
    }

    /**
     * queueを配列に入れる
     *
     * @param array $queue
     * @return void
     */
    private function enqueue(array $queue): void
    {
        $this->array[$this->tail] = $queue;
        if ($this->tail + 1 === $this->max) {
            $this->tail = 0;
        } else {
            $this->tail++;
        }
    }
}

$main = new Main();
$main->execute();




