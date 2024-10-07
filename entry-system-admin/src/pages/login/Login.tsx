import React, { useState } from "react";
import {
	IonPage,
	IonContent,
	IonInput,
	IonButton,
	IonHeader,
	IonToolbar,
	IonTitle,
	IonItem,
	IonLabel,
	IonToast,
} from "@ionic/react";
import { useHistory } from "react-router-dom";
import authService from "../../services/authentication/auth";
import "./Login.css";

const Login: React.FC = () => {
	const [email, setEmail] = useState<string>("");
	const [password, setPassword] = useState<string>("");
	const [showToast, setShowToast] = useState<{
		show: boolean;
		message: string;
	}>({
		show: false,
		message: "",
	});

	const history = useHistory();

	const handleLogin = async () => {
		try {
			const response = await authService.login(email, password);
			authService.setToken(response.token);
			setShowToast({ show: true, message: "Login successful!" });

			history.push("/");
		} catch (error: any) {
			setShowToast({ show: true, message: error.message });
		}
	};

	return (
		<IonPage>
			<IonHeader translucent={true}>
				<IonToolbar>
					<IonTitle>Login</IonTitle>
				</IonToolbar>
			</IonHeader>

			<IonContent className="ion-padding" fullscreen={true}>
				<IonHeader collapse="condense">
					<IonToolbar>
						<IonTitle size="large">Judge Login</IonTitle>
					</IonToolbar>
				</IonHeader>

				<div id="container" className="ion-padding">
					<IonItem>
						<IonLabel position="floating">Email</IonLabel>
						<IonInput
							type="email"
							value={email}
							onIonChange={(e: any) => setEmail(e.detail.value!)}
							required
						/>
					</IonItem>
					<IonItem>
						<IonLabel position="floating">Password</IonLabel>
						<IonInput
							type="password"
							value={password}
							onIonChange={(e: any) =>
								setPassword(e.detail.value!)
							}
							required
						/>
					</IonItem>
					<div id="buttons">
						<IonButton onClick={handleLogin}>Login</IonButton>
					</div>
					<IonToast
						isOpen={showToast.show}
						message={showToast.message}
						duration={2000}
						onDidDismiss={() =>
							setShowToast({ show: false, message: "" })
						}
					/>
				</div>
			</IonContent>
		</IonPage>
	);
};

export default Login;
