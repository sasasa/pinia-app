<script setup>
import ProductList from './components/ProductList.vue';
import ShoppingCart from './components/ShoppingCart.vue';
</script>

<template>
  <div id="app" class="p-4">
    <h1 class="mb-4">Pinia入門（カート)</h1>
    <hr />
    <h2 class="my-4">商品一覧</h2>
    <ProductList />
    <hr />
    <ShoppingCart />
  </div>
</template>