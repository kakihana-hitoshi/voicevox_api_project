# VOICEVOX 音声合成 REST API版

### 概要
「字幕テキスト」に記載された文章から「音声」を作成する。

### 実行環境
```
Mac Book Pro 13インチ M2 
注意：Windowsでは動作しません
```

### 必須インストール
[VOICEVOX](https://voicevox.hiroshiba.jp/)       

ターミナルを起動してbrewコマンドでPHPとcurlインストール
```shell
brew install php@8.0 curl
```

### 実行
```shell
php main.php
```

### 「字幕テキスト」 subtitles.csv
- CSVフォーマット
```
字幕に変更したい文章,スピーカーID
```
　補足：スピーカーIDは省略可能。省略時は、main.phpに設定している「玄野武宏」の音声になる

- 例
```
字幕１行目,21
字幕２行目,3
字幕３行目スピーカーID省略
```

### 「音声」出力先
```shell
voicevox_api_project/voice/
```

### APIドキュメント
```
# GUIの「VOICEVOX」を起動してブラウザからアクセスします
http://localhost:50021/docs
```

### スピーカーID 情報
```shell
# スピーカーID 一覧取得  :  idを使用してキャラクターの音声を選択します
curl -s -H "Content-Type: application/json" -X GET "localhost:50021/presets"
```
```json
[
	{
		"name" : "四国めたん",
		"speaker_uuid" : "7ffcb7ce-00ec-4bdc-82cd-45a8889e43ff",
		"styles" : [
			{
				"id" : 2,
				"name" : "ノーマル"
			},
			{
				"id" : 0,
				"name" : "あまあま"
			},
			{
				"id" : 6,
				"name" : "ツンツン"
			},
			{
				"id" : 4,
				"name" : "セクシー"
			}
		],
		"versio"ずんだもん",
		"speaker_uuid" : "388f246b-8c41-4ac1-8e2d-5d79f3ff56d9",
		"styles" : [
			{
				"id" : 3,
				"name" : "ノーマル"
			},
			{
				"id" : 1,
				"name" : "あまあま"
			},
			{
				"id" : 7,
				"name" : "ツンツン"
			},
			{
				"id" : 5,
				"name" : "セクシー"
			}
		],
		"version" : "0.12."speaker_uuid" : "35b2c544-660e-401e-b503-0e14c635303a",
		"styles" : [
			{
				"id" : 8,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "雨晴はう",
		"speaker_uuid" : "3474ee95-c274-47f9-aa1a-8322163d96f1",
		"styles" : [
			{
				"id" : 1:"ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "波音リツ",
		"speaker_uuid" : "b1a81618-b27b-40d2-b0ea-27a9ad408c4b",
		"styles" : [
			{
				"id" : 9,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "玄野武宏",
		"speaker_uuid" : "c3-8bb8-ad3b314e6a6f",
		"styles" : [
			{
				"id" : 11,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "白上虎太郎",
		"speaker_uuid" : "e5020595-5c5d-4e87-b849-270a518d0dcf",
		"styles" : [
			{
				"id" : 12,
				"name" : "ノーマル"
			}
		],
		"version"
	},
	{
		"name" : "青山龍星",
		"speaker_uuid" : "4f51116a-d9ee-4516-925d-21f183e2afad",
		"styles" : [
			{
				"id" : 13,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "冥鳴ひまり",
		"speaker_uuid" : "8eaad775-3119-417e-8cf4-2a10bfds" : [
			{
				"id" : 14,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "九州そら",
		"speaker_uuid" : "481fb609-6446-4870-9f46-90c4dd623403",
		"styles" : [
			{
				"id" : 16,
				"name" : "ノーマル"
			},
			{
				"id" : 15,
				"name" : "あまあま"
			},
			{
				"id" : 18,
				"id" : 17,
				"name" : "セクシー"
			},
			{
				"id" : 19,
				"name" : "ささやき"
			}
		],
		"version" : "0.12.4"
	},
	{
		"name" : "もち子さん",
		"speaker_uuid" : "9f3ee141-26ad-437e-97bd-d22298d02ad2",
		"styles" : [
			{
				"id" : 20,
				"name" : "ノーマル"
			}
		],
		"version" : "0.崎雌雄",
		"speaker_uuid" : "1a17ca16-7ee5-4ea5-b191-2f02ace24d21",
		"styles" : [
			{
				"id" : 21,
				"name" : "ノーマル"
			}
		],
		"version" : "0.12.4"
	}
]
```