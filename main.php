<?php
// デフォルト音声キャラクター : 玄野武宏
$default_speaker_id = 11;

// VOICEVOX起動
exec('sh start_voicevox.sh');

// 前処理
exec('rm -rf ./voice && mkdir ./voice');

// ディレクトリ作成
$now_date = date('Y-m-d_H:m:s', strtotime('now'));
$mkdir_root_name = './voicevox_' . $now_date;
mkdir($mkdir_root_name);

// 字幕ファイルから音声作成
$subtitles = file('subtitles.csv');
foreach ($subtitles as $key => $row) {
    $file_subtitle_name = 'text.txt';
    $file_subtitle = $mkdir_root_name . '/' . $file_subtitle_name;
    $row = explode(',', $row);
    $speaker_id = empty($row[1]) ? $default_speaker_id : str_replace(["\r\n", "\r", "\n"], '', $row[1]);
    // 字幕文字列
    file_put_contents($file_subtitle, str_replace(["\r\n", "\r", "\n"], '', $row[0]));

    $exec_output_query_file = <<<EOF
cd $mkdir_root_name && curl -s -X POST "localhost:50021/audio_query?speaker=$speaker_id" --get --data-urlencode text@$file_subtitle_name > query.json
EOF;
//    echo "\n\n # DEBUG exec_output_query_file";
//    var_export($exec_output_query_file);
    exec($exec_output_query_file);

    // voicevoxで音声作成
    $row_speaker = ($key + 1) . '_' . $speaker_id;
    $exec_make_audio = <<<EOF
cd $mkdir_root_name && curl -s -H "Content-Type: application/json" -X POST -d @query.json "localhost:50021/synthesis?speaker=$speaker_id" > ../voice/audio_$row_speaker.wav
EOF;
//    echo "\n\n # DEBUG exec_make_audio";
//    var_export($exec_make_audio);
    exec($exec_make_audio);
}

// 後処理
exec('rm -rf voicevox_*');

// VOICEVOX停止
exec('sh stop_voicevox.sh');