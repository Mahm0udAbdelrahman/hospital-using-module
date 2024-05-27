<?php

use Modules\Subscribers\Models\Subscriber;

uses(Tests\TestCase::class);

test('can see subscriber list', function() {
    $this->authenticate();
   $this->get(route('app.subscribers.index'))->assertOk();
});

test('can see subscriber create page', function() {
    $this->authenticate();
   $this->get(route('app.subscribers.create'))->assertOk();
});

test('can create subscriber', function() {
    $this->authenticate();
   $this->post(route('app.subscribers.store', [
       'name' => 'Joe',
       'email' => 'joe@joe.com'
   ]))->assertRedirect(route('app.subscribers.index'));

   $this->assertDatabaseCount('subscribers', 1);
});

test('can see subscriber edit page', function() {
    $this->authenticate();
    $subscriber = Subscriber::factory()->create();
    $this->get(route('app.subscribers.edit', $subscriber->id))->assertOk();
});

test('can update subscriber', function() {
    $this->authenticate();
    $subscriber = Subscriber::factory()->create();
    $this->patch(route('app.subscribers.update', $subscriber->id), [
        'name' => 'Joe Smith',
       'email' => 'joe@joe.com'
    ])->assertRedirect(route('app.subscribers.index'));

    $this->assertDatabaseHas('subscribers', ['name' => 'Joe Smith']);
});

test('can delete subscriber', function() {
    $this->authenticate();
    $subscriber = Subscriber::factory()->create();
    $this->delete(route('app.subscribers.delete', $subscriber->id))->assertRedirect(route('app.subscribers.index'));

    $this->assertDatabaseCount('subscribers', 0);
});