import axios, { AxiosResponse } from "axios";
import authService from "../authentication/auth";
import { Entry } from "../../models/Entry";

interface CreateEntryParams {
	score: number;
}

class EntryService {
	private url: string;
	private headers: any;

	constructor() {
		this.url = "http://localhost:8000/api/entries";
		this.headers = authService.getHeaders();
	}

	public getEntries(): Promise<Entry[]> {
		return axios
			.get(this.url, { headers: this.headers })
			.then((response: AxiosResponse<Entry[]>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}

	public findEntry(id: number): Promise<Entry> {
		return axios
			.get(`${this.url}/${id}`, { headers: this.headers })
			.then((response: AxiosResponse<Entry>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}

	public updateEntry(score: number, id: number): Promise<Entry> {
		let params = {
			score: score,
		};
		return axios
			.put(`${this.url}/${id}`, params, { headers: this.headers })
			.then((response: AxiosResponse<Entry>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}

	public getUserEntries(): Promise<Entry[]> {
		return axios
			.get(`${this.url}/user/all`, { headers: this.headers })
			.then((response: AxiosResponse<Entry[]>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}

	public getEntryMeta(id: number): Promise<any> {
		return axios
			.get(`${this.url}/meta/${id}`, { headers: this.headers })
			.then((response: AxiosResponse<Entry[]>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}

	public getUserUnpaidEntries(): Promise<Entry[]> {
		return axios
			.get(`${this.url}/unpaid/user`, { headers: this.headers })
			.then((response: AxiosResponse<Entry[]>) => response.data)
			.catch((error: any) => {
				throw error;
			});
	}
}

export default new EntryService();
