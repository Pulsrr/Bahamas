
-----------------------------------------------------------------------------
-- password_retrieve
-----------------------------------------------------------------------------

DROP TABLE "password_retrieve" CASCADE;


CREATE TABLE "password_retrieve"
(
	"id" serial  NOT NULL,
	"email" VARCHAR(100)  NOT NULL,
	"token" VARCHAR(255),
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "password_retrieve" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- location
-----------------------------------------------------------------------------

DROP TABLE "location" CASCADE;


CREATE TABLE "location"
(
	"id" serial  NOT NULL,
	"adress" VARCHAR(255),
	"count" INTEGER default 1,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "location" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- driver
-----------------------------------------------------------------------------

DROP TABLE "driver" CASCADE;


CREATE TABLE "driver"
(
	"id" serial  NOT NULL,
	"user_id" INTEGER  NOT NULL,
	"name" VARCHAR(100),
	"first_name" VARCHAR(100),
	"email" VARCHAR(100),
	"phone" VARCHAR(100),
	"taxi_code" VARCHAR(50)  NOT NULL,
	"hq" VARCHAR(255),
	"hq_lat" VARCHAR(100),
	"hq_lng" VARCHAR(100),
	"hq_area" INTEGER,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "driver" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- driver_notification
-----------------------------------------------------------------------------

DROP TABLE "driver_notification" CASCADE;


CREATE TABLE "driver_notification"
(
	"id" serial  NOT NULL,
	"driver_id" INTEGER  NOT NULL,
	"message" TEXT,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "driver_notification" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- driver_customer
-----------------------------------------------------------------------------

DROP TABLE "driver_customer" CASCADE;


CREATE TABLE "driver_customer"
(
	"id" serial  NOT NULL,
	"gender" VARCHAR(30)  NOT NULL,
	"driver_id" INTEGER,
	"user_id" INTEGER,
	"name" VARCHAR(100)  NOT NULL,
	"first_name" VARCHAR(100)  NOT NULL,
	"email" VARCHAR(100)  NOT NULL,
	"phone_country" VARCHAR(10)  NOT NULL,
	"phone_number" VARCHAR(100)  NOT NULL,
	"phone_international" VARCHAR(110),
	"postal_code" VARCHAR(100),
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "driver_customer" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- driver_account_category
-----------------------------------------------------------------------------

DROP TABLE "driver_account_category" CASCADE;


CREATE TABLE "driver_account_category"
(
	"id" serial  NOT NULL,
	"name" VARCHAR(100),
	"vat" DECIMAL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "driver_account_category" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- driver_account
-----------------------------------------------------------------------------

DROP TABLE "driver_account" CASCADE;


CREATE TABLE "driver_account"
(
	"driver_id" INTEGER  NOT NULL,
	"category_id" INTEGER  NOT NULL,
	"amount" DECIMAL,
	"created_at" TIMESTAMP,
	"id" serial  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "driver_account" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- fare
-----------------------------------------------------------------------------

DROP TABLE "fare" CASCADE;


CREATE TABLE "fare"
(
	"id" serial  NOT NULL,
	"hash" VARCHAR(255)  NOT NULL,
	"driver_id" INTEGER,
	"customer_id" INTEGER,
	"start_address" VARCHAR(255)  NOT NULL,
	"flight_number" VARCHAR(100),
	"start_lat" VARCHAR(100),
	"start_lng" VARCHAR(100),
	"end_address" VARCHAR(255)  NOT NULL,
	"end_lat" VARCHAR(100),
	"end_lng" VARCHAR(100),
	"date" DATE  NOT NULL,
	"time" TIME  NOT NULL,
	"taxi_code" VARCHAR(50),
	"datetime" TIMESTAMP,
	"duration" INTEGER,
	"distance" INTEGER,
	"real_start_lat" VARCHAR(100),
	"real_start_lng" VARCHAR(100),
	"real_end_lat" VARCHAR(100),
	"real_end_lng" VARCHAR(100),
	"real_duration" INTEGER,
	"real_distance" INTEGER,
	"price" DECIMAL,
	"supplement" DECIMAL,
	"vat" DECIMAL,
	"price_including_tax" DECIMAL,
	"confirmed" BOOLEAN default 'f',
	"valid" BOOLEAN default 'f',
	"taken" BOOLEAN default 'f',
	"finished" BOOLEAN default 'f',
	"done" BOOLEAN default 'f',
	"customer_available" BOOLEAN default 'f',
	"special_request" TEXT,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "fare" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- fare_request
-----------------------------------------------------------------------------

DROP TABLE "fare_request" CASCADE;


CREATE TABLE "fare_request"
(
	"id" serial  NOT NULL,
	"hash" VARCHAR(255)  NOT NULL,
	"start_address" VARCHAR(255)  NOT NULL,
	"flight_number" VARCHAR(100),
	"end_address" VARCHAR(255)  NOT NULL,
	"date" DATE  NOT NULL,
	"time" TIME  NOT NULL,
	"taxi_code" VARCHAR(50),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "fare_request" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- prime
-----------------------------------------------------------------------------

DROP TABLE "prime" CASCADE;


CREATE TABLE "prime"
(
	"id" serial  NOT NULL,
	"driver_id" INTEGER  NOT NULL,
	"payer_id" INTEGER  NOT NULL,
	"fare_id" INTEGER  NOT NULL,
	"amount" DECIMAL,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "prime" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- participation
-----------------------------------------------------------------------------

DROP TABLE "participation" CASCADE;


CREATE TABLE "participation"
(
	"id" serial  NOT NULL,
	"driver_id" INTEGER  NOT NULL,
	"fare_id" INTEGER  NOT NULL,
	"amount" DECIMAL,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "participation" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- user_unavailability
-----------------------------------------------------------------------------

DROP TABLE "user_unavailability" CASCADE;


CREATE TABLE "user_unavailability"
(
	"id" serial  NOT NULL,
	"user_id" INTEGER  NOT NULL,
	"fare_id" INTEGER,
	"from_datetime" TIMESTAMP  NOT NULL,
	"to_datetime" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "user_unavailability" IS '';


SET search_path TO public;
ALTER TABLE "driver" ADD CONSTRAINT "driver_FK_1" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user" ("id");

ALTER TABLE "driver_notification" ADD CONSTRAINT "driver_notification_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "driver_customer" ADD CONSTRAINT "driver_customer_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "driver_customer" ADD CONSTRAINT "driver_customer_FK_2" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user" ("id");

ALTER TABLE "driver_account" ADD CONSTRAINT "driver_account_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "driver_account" ADD CONSTRAINT "driver_account_FK_2" FOREIGN KEY ("category_id") REFERENCES "driver_account_category" ("id");

ALTER TABLE "fare" ADD CONSTRAINT "fare_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "fare" ADD CONSTRAINT "fare_FK_2" FOREIGN KEY ("customer_id") REFERENCES "driver_customer" ("id");

ALTER TABLE "prime" ADD CONSTRAINT "prime_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "prime" ADD CONSTRAINT "prime_FK_2" FOREIGN KEY ("payer_id") REFERENCES "driver" ("id");

ALTER TABLE "prime" ADD CONSTRAINT "prime_FK_3" FOREIGN KEY ("fare_id") REFERENCES "fare" ("id");

ALTER TABLE "participation" ADD CONSTRAINT "participation_FK_1" FOREIGN KEY ("driver_id") REFERENCES "driver" ("id");

ALTER TABLE "participation" ADD CONSTRAINT "participation_FK_2" FOREIGN KEY ("fare_id") REFERENCES "fare" ("id");

ALTER TABLE "user_unavailability" ADD CONSTRAINT "user_unavailability_FK_1" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user" ("id");

ALTER TABLE "user_unavailability" ADD CONSTRAINT "user_unavailability_FK_2" FOREIGN KEY ("fare_id") REFERENCES "fare" ("id") ON DELETE CASCADE;
