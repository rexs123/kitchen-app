<?php
namespace Tests\TestCase;

use function Pest\Laravel\get;

test('has home', function () {
  get('/')->assertStatus(200);
});
