<?php

namespace Katyusha\Databases\Elasticsearch;

use  Elastica\Client;
use Elastica\Document;
use Elastica\Response;

class Elasticsearch {
    protected Client $client;

    public function __construct() {
        $this->client = new Client(['host' => config('elasticsearch.connection.host'), 'port' => config('elasticsearch.connection.port')]);
    }

    /**
     * @param object[] $data
     */
    protected function arrayToDocument(string $id, array $data): Document {
        return new Document($id, $data);
    }

    public  function index(string $id, string $index, mixed $data): Response {
        return $this->client->getIndex($index)->addDocument($this->arrayToDocument($id, $data));
    }

    public  function bulk(string $index, array $data): Response {
        $documents = [];
        foreach ($data as $item) {
            $id = $item['_id'];
            unset($item['_id']);
            $documents[] = $this->arrayToDocument($id, $item);
        }

        return $this->client->getIndex($index)->addDocuments($documents);
    }
}
