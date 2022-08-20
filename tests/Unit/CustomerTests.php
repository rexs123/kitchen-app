<?php
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('has customers route', function () {
  get('/dashboard/customers')->assertStatus(200);
});
