import React from "react";
import { Route, Redirect } from "react-router-dom";
import authService from "../../services/authentication/auth";

interface PrivateRouteProps {
	component: React.FC<any>;
	path: string;
	exact?: boolean;
}

const PrivateRoute: React.FC<PrivateRouteProps> = ({
	component: Component,
	...rest
}) => {
	return (
		<Route
			{...rest}
			render={(props) =>
				authService.isAuthenticated() ? (
					<Component {...props} />
				) : (
					<Redirect to="/login" />
				)
			}
		/>
	);
};

export default PrivateRoute;
