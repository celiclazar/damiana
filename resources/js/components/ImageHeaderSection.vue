<script>
export default  {
    props: {
        imageHeaderSection: Object,
    }
}
</script>

<template>
    <section>
        <div class="relative h-1/2 lg:h-screen">
            <img class="relative inset-0 md:w-full md:h-full object-cover bg-clip-border" :src="imageHeaderSection.imageUrl">
        </div>
    </section>
</template>

<style scoped>

</style>
