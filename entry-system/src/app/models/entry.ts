export class Entry {
    constructor(
        public id: number,
        public title: string,
        public payment_status: string,
        public judgement_status: string,
        public score: number,
        public winner_status: string,
        public description: string,
        public user_id: number,
        public order_id: number,
        public entry_category: number,
        public created_at: string
    ) {}
}
