# Stage 1: Build the app
FROM node:20 AS build

# Set the working directory
WORKDIR /app

# Install Ionic CLI globally
RUN npm install -g @ionic/cli

# Copy package.json and package-lock.json
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the rest of the application code
COPY . .

# Build the Ionic app
RUN ionic build --prod

# Stage 2: Serve the app using a lightweight web server
FROM nginx:alpine

# Copy the built app from the previous stage
COPY --from=build /app/dist /usr/share/nginx/html

# Copy custom Nginx configuration
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start nginx
CMD ["nginx", "-g", "daemon off;"]
