# Base image
FROM node:22

# Set the working directory
WORKDIR /usr/src/app

# Install Ionic CLI globally
RUN npm install -g @ionic/cli

# Copy package.json and package-lock.json
COPY package.json ./

# Install dependencies
RUN npm install

# Remove node_modules folder
RUN rm -rf node_modules

# Remove package-lock.json file
RUN rm package-lock.json

# Install dependencies
RUN npm install

# Copy the entire project
COPY . .

# Expose the Ionic development port
EXPOSE 8100

# Command to run the Ionic Angular app
CMD ["ionic", "serve", "--host=localhost", "--port=8100"]
