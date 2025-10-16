lemp prepared for dokploy
  - php
  - nginx
  - mariadb
  - sftp

setup
  - new services
    - compose
  - General
    - Provider
      - Git
        - Repository URL: 
          - https://github.com/hasanakdeniz/php
        - Branch:
          - main
        - Compose Path:
          - ./docker-compose.yml
  - Environment
    - Copy the .env file and arrange it as you wish
  - Advanced
    - Enable Isolated Deployment
      - Enable

#sudosu
