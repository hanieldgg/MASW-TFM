const API_URL = "http://localhost:8000/api/auth";

const authService = {
	login: async (email: string, password: string) => {
		try {
			const response = await fetch(API_URL + "/login", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					email: email,
					password: password,
				}),
			});

			if (!response.ok) {
				throw new Error("Failed to log in");
			}

			const data = await response.json();

			return {
				token: data.token,
				success: data.success,
			};
		} catch (error) {
			throw new Error("Invalid credentials or server error");
		}
	},

	logout: () => {
		localStorage.removeItem("authToken");
	},

	isAuthenticated: () => {
		return !!localStorage.getItem("authToken");
	},

	getToken(): string | null {
		return localStorage.getItem("authToken");
	},

	setToken: (token: string) => {
		const now = new Date();
		const tokenData = {
			token: token,
			createdAt: now.toISOString(),
		};
		localStorage.setItem("authToken", JSON.stringify(tokenData));
	},

	getHeaders(): { Authorization: string } | null {
		const token = this.getToken();

		if (token) {
			console.log("token detected", token);
			const tokenData = JSON.parse(token);
			return {
				Authorization: `Bearer ${tokenData.token}`,
			};
		} else {
			return null;
		}
	},
};

export default authService;
