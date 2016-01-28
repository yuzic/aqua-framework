CREATE TABLE "comment" (
  "id" serial,
  "name" character varying(100) NOT NULL,
  "email" character varying(100)  NOT NULL,
  "homepage" character varying(100)  NOT NULL,
  "ip" character varying(100)  NOT NULL,
  "agent" character varying(500)  NOT NULL,
  "message" text,
  "created_at" integer DEFAULT NULL,
  CONSTRAINT comment_pkey PRIMARY KEY (id )
);