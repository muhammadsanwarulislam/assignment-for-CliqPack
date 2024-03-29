<script setup>
	// Get Data from state
	const user_data = storeUserData().user_data;

	const { user, logout } = useAuth();
	const status = computed(() => {
		if (user.value) {
			return 'authenticated';
		}
		return 'unauthenticated';
	});
</script>


<template>
	<div class="bg-white px-5 py-4 rounded-t shadow-xl">
		<div class="flex items-center justify-between">
			<div class="flex items-center space-x-2">
				<img
					v-if="status === 'authenticated' && user_data?.user?.image"
					class="w-12 h-12 rounded-full"
					:src="user_data?.user?.image"
					alt="User Avatar" />
				<h1 v-if="status === 'authenticated'" class="text-lg">Authenticated as {{ user_data?.user.name }},</h1>
				<h1 v-if="status === 'authenticated'" class="text-lg"> email: {{ user_data?.user.email}}!</h1>
				<h1 v-else>Not logged in</h1>
			</div>
		</div>
	</div>
</template>